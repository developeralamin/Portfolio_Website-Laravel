<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\Project;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['project']  = Project::all();
        return view('admin.project.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
          'project_name'        => 'required',
          'project_des'         => 'required',
          'project_link'         => 'required',
          'project_img'         => 'required||mimes:jpeg,jpg,bmp,png,svg',
        ]);

        $image = $request->file('project_img');
        // $slug = str_slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename =  $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/project'))
            {
                mkdir('uploads/project', 0777 , true);
            }
            $image->move('uploads/project',$imagename);
        }else {
            $imagename = 'dafault.png';
        }

        $project                       = new Project();
        $project->project_name         = $request->project_name;
        $project->project_des          = $request->project_des;
        $project->project_link         = $request->project_link;
        $project->project_img          = $imagename;
       if($project->save()){
         Session::flash('message','Project Successfully Added');
       }
       return redirect()->route('project.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['project']  = Project::findOrFail($id);
        return view('admin.project.edit',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          $data                             = $request->all();

         $project                            = Project::find($id);
         $project->project_name               = $data['project_name'];
         $project->project_des                = $data['project_des'];

         if($project->save() ){
            Session::flash('message','Project Update Successfully');
         }

         return redirect()->route('project.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        if (file_exists('uploads/project/'.$project->project_img))
        {
            unlink('uploads/project/'.$project->project_img);
        }
       if($project->delete() ){
            Session::flash('message','Project Successfully Deleted');
       }
        return redirect()->back();
    }
}

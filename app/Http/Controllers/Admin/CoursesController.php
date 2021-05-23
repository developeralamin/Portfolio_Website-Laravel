<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\Courses;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['courses']  = Courses::all();
        return view('admin.course.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.course.create');
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
          'course_name'        => 'required',
          'course_des'         => 'required',
          'course_fee'         => 'required',
          'course_totalenroll' => 'required',
          'course_totalclass'  => 'required',
          'course_link'        => 'required',
          'course_img'         => 'required||mimes:jpeg,jpg,bmp,png,svg',
        ]);

        $image = $request->file('course_img');
        // $slug = str_slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename =  $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/course'))
            {
                mkdir('uploads/course', 0777 , true);
            }
            $image->move('uploads/course',$imagename);
        }else {
            $imagename = 'dafault.png';
        }

        $course                      = new Courses();
        $course->course_name         = $request->course_name;
        $course->course_des          = $request->course_des;
        $course->course_fee          = $request->course_fee;
        $course->course_totalenroll  = $request->course_totalenroll;
        $course->course_totalclass   = $request->course_totalclass;
        $course->course_link         = $request->course_link;
        $course->course_img          = $imagename;
       if($course->save()){
         Session::flash('message','Course Successfully Added');
       }
       return redirect()->route('courses.index');
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
        $this->data['courses']  = Courses::findOrFail($id);
        return view('admin.course.edit',$this->data);
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
         $data                              = $request->all();

         $course                            = Courses::find($id);
         $course->course_name               = $data['course_name'];
         $course->course_des                = $data['course_des'];
         $course->course_fee                = $data['course_fee'];
         $course->course_totalenroll        = $data['course_totalenroll'];
         $course->course_totalclass         = $data['course_totalclass'];

         if($course->save() ){
            Session::flash('message','Courses Update Successfully');
         }

         return redirect()->route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $course = Courses::find($id);
        if (file_exists('uploads/course/'.$course->course_img))
        {
            unlink('uploads/course/'.$course->course_img);
        }
       if($course->delete() ){
            Session::flash('message','Course Successfully Deleted');
       }
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ShakaRequest;
use Carbon\Carbon;
use App\Models\Service;



class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['service'] = Service::all();
        return view('admin.service.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
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
          'service_name'        => 'required',
          'service_des'         => 'required',
          'service_img'         => 'required||mimes:jpeg,jpg,bmp,png,svg',
        ]);

        $image = $request->file('service_img');
        // $slug = str_slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename =  $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/service'))
            {
                mkdir('uploads/service', 0777 , true);
            }
            $image->move('uploads/service',$imagename);
        }else {
            $imagename = 'dafault.png';
        }

        $service                       = new Service();
        $service->service_name         = $request->service_name;
        $service->service_des          = $request->service_des;
        $service->service_img          = $imagename;
       if($service->save()){
         Session::flash('message','Service Successfully Added');
       }
       return redirect()->route('service.index');

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
       $this->data['service']  = Service::findOrFail($id);
        return view('admin.service.edit',$this->data);
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
        $this->validate($request,[
          'service_name'        => 'required',
          'service_des'         => 'required',
          'service_img'         => 'required||mimes:jpeg,jpg,bmp,png,svg',
        ]);

       $image = $request->file('service_img');
        // $slug = str_slug($request->title);
        $service = Service::find($id);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/service'))
            {
                mkdir('uploads/service', 0777 , true);
            }
            unlink('uploads/service/'.$service->service_img);
            $image->move('uploads/service',$imagename);
        }else {
            $imagename = $service->image;
        }

        $service->service_name         = $request->service_name;
        $service->service_des          = $request->service_des;
        $service->service_img          = $imagename;
        $service->save();
        return redirect()->route('service.index')->with('successMsg','Slider Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        if (file_exists('uploads/service/'.$service->service_img))
        {
            unlink('uploads/service/'.$service->service_img);
        }
       if($service->delete() ){
            Session::flash('message','Service Successfully Deleted');
       }
        return redirect()->back();
    }
}

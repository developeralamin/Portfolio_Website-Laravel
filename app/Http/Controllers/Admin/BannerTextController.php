<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\BannerText;

class BannerTextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['bennar'] = BannerText::all();

        return view('admin.bennar.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bennar.create');
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
          'benner_title'              => 'required',
          'benner_sub'                => 'required',
          'benner_sub_title'          => 'required',
        ]);

         $formdata = $request->all();
         if( BannerText::create($formdata)){
          Session::flash('message', 'BannerText Successfully Added');
         }
         
         return redirect()->route('benner.index');
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
        $this->data['bennar']  = BannerText::findOrFail($id);
        return view('admin.bennar.edit',$this->data);
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

         $benner                            = BannerText::find($id);
         $benner->benner_title              = $data['benner_title'];
         $benner->benner_sub                = $data['benner_sub'];
         $benner->benner_sub_title          = $data['benner_sub_title'];

         if($benner->save() ){
            Session::flash('message','Bennar Update Successfully');
         }

         return redirect()->route('benner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $service = BannerText::find($id);
       if($service->delete() ){
            Session::flash('message','BannerText Successfully Deleted');
       }
        return redirect()->back();
    }
}

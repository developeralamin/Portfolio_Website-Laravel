<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\Revew;


class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['review']  = Revew::all();
        return view('admin.review.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.review.create');
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
          'review_name'        => 'required',
          'review_des'         => 'required',
          'review_msg'         => 'required||mimes:jpeg,jpg,bmp,png,svg',
        ]);

        $image = $request->file('review_msg');
        // $slug = str_slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename =  $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/review'))
            {
                mkdir('uploads/review', 0777 , true);
            }
            $image->move('uploads/review',$imagename);
        }else {
            $imagename = 'dafault.png';
        }

        $review                      = new Revew();
        $review->review_name         = $request->review_name;
        $review->review_des          = $request->review_des;
        $review->review_msg          = $imagename;
       if($review->save()){
         Session::flash('message','Review Successfully Added');
       }
       return redirect()->route('review.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['review']  = Revew::findOrFail($id);
         return view('admin.review.show',$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['review']  = Revew::findOrFail($id);
        return view('admin.review.edit',$this->data);
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

         $review                            = Revew::find($id);
         $review->review_name              = $data['review_name'];
         $review->review_des                = $data['review_des'];

         if($review->save() ){
            Session::flash('message','Review Update Successfully');
         }

         return redirect()->route('review.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $review = Revew::find($id);
        if (file_exists('uploads/review/'.$review->review_msg))
        {
            unlink('uploads/review/'.$review->review_msg);
        }
       if($review->delete() ){
            Session::flash('message','Review Successfully Deleted');
       }
        return redirect()->back();
    }
}

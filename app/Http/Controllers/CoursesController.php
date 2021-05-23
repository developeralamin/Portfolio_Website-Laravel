<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;

class CoursesController extends Controller
{
    public function courses()
    {
    	$this->data['course']  = Courses::all();
    	return view('course',$this->data);
    }
}

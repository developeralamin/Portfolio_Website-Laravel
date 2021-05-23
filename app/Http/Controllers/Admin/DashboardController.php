<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\BannerText;
use App\Models\Courses;
use App\Models\Project;
use App\Models\Contact;
use App\Models\Revew;



class DashboardController extends Controller
{
	public function index()
	{

       $this->data['totalReview']        = Revew::count();
       $this->data['totalService']       = Service::count();
       $this->data['totalCourses']       = Courses::count();
       $this->data['totalProject']       = Project::count();
       $this->data['totalContact']       = Contact::count();

		return view('admin.dashboard',$this->data);
	}
    
}

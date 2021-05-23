<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\BannerText;
use App\Models\Courses;
use App\Models\Project;
use App\Models\Contact;
use App\Models\Revew;
use App\Models\Review;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->data['service']        = Service::all();
        $this->data['bennar']         = BannerText::all();
        $this->data['course']         = Courses::all();
        $this->data['project']        = Project::all();
        $this->data['review']         = Revew::all();

        return view('welcome',$this->data);
    }
}

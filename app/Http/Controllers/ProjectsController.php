<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;


class ProjectsController extends Controller
{
    public function project()
    {
    	$this->data['project']  = Project::all();
    	return view('project',$this->data);
    }
}

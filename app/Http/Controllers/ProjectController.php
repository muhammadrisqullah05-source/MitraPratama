<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use DB;

class ProjectController extends Controller
{
   public function index()
    {
        return view('project');
    }
    public function gmaps()

    {

    	$location = DB::table('location')->get();

    	return view('gmaps',compact('location'));

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function showData()
    {
        $faqs = DB::table('faqs')->get();

        $packages = DB::table('packages')->get();

        $testimonials = DB::table('testimonials')->where('isPublished', 1)->get();

        $teams = DB::table('teams')->where('isPublished', 1)->get();

        return view('index', compact('faqs', 'packages', 'testimonials', 'teams'));
    }
}

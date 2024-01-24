<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonials;
use App\Models\cars;

class MainController extends Controller
{
    public function index(){
        $cars=cars::get();
        return view('User.index',compact('cars'));

    }







    public function testimonialsuser(){
        $testimonials=Testimonials::get();
        return view('users.layouts.testimonials',compact('testimonials'));
    }
}

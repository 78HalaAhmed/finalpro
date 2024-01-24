<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonials;
use App\Models\cars;
use App\Models\Categories;

class MainController extends Controller
{
    public function index(){
        $cars=cars::latest()->take(6)->get()->where('active','=', 1);
        $testimonials=Testimonials::latest()->take(3)->get()->where('published','=', 1);
        return view('users.index',compact('cars','testimonials'));
    }

    public function single( string $id)
    {
        $cars = cars::findOrFail($id);
        $categories=Categories::get();
        return view('single', compact('cars','categories'));
        
    }
    public function carlisting( )
    {
        $cars=cars::paginate(6)->where('active','=', 1);
        $testimonials=Testimonials::latest()->take(3)->get()->where('published','=', 1);
        return view('users.index',compact('cars','testimonials'));
    }

    public function testimonialsuser()
    {
        $testimonials=Testimonials::get()->where('published','=', 1);
        return view('users.testimonials',compact('testimonials'));
    }
    public function blog()
    {
        return view('users.blog');
    }
    public function about()
    {
        return view('users.about');
    }
    public function contact()
    {
        return view('users.contact');
    }
  
}

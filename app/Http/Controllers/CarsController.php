<?php

namespace App\Http\Controllers;

use App\Models\cars;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Traits\Common;

class CarsController extends Controller
{ use common;
    private $columns = ['title','content','luggage','doors','passengers','price','active','image','category_id'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars=cars::get();
        return view('layout.cars',compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::get();
        return view('layout.addCar', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $messages=$this->messages();
        $data=$request->validate([
            'title'=>'required|string',
            'content'=>'required|string',
            'luggage'=>'required|numeric',
            'doors'=>'required|numeric',
            'passengers'=>'required|numeric',
            'price'=>'required|numeric',
            'category_id' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ], $messages);
            $fileName = $this->uploadFile($request->image, 'userassets/images');
            $data['image'] = $fileName;
            $data['active'] = isset($request['active']); 
            cars::create($data);        
            return redirect()->route('CarsList');
    }

    /**
     * Display the specified resource.
     */
    public function show(cars $cars)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = cars::findOrFail($id);
        $categories = Categories::select('id', 'categoryname')->get();
        return view('layout.editCar', compact('car', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages=$this->messages();
        $data=$request->validate([
            'title'=>'required|string',
            'content'=>'required|string',
            'luggage'=>'required|numeric',
            'doors'=>'required|numeric',
            'passengers'=>'required|numeric',
            'price'=>'required|numeric',
            'category_id'=>'required',
            'image' =>'sometimes|mimes:png,jpg,jpeg|max:2048',
        ], $messages);
         // Update image if new file selected
         if ($request->hasFile('image')) {
            $fileName = $this->uploadFile($request->image, 'userassets/images');
            $data['image'] = $fileName;}
            $data['active'] = isset($request['active']); 
            cars:: where('id',$id)->update($data);        
            return redirect()->route('CarsList');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        cars::where('id', $id)->delete();        
        return redirect()->route('CarsList');
    }
    public function messages()
    {
        return [
            'title.required' => ' title is required',
            'content.required' => 'content is required',
            'luggage.required' => 'luggageis required',
            'doors.required' => 'doors is required',
            'passengers.required' => 'passengers is required',
            'price.required' => 'price is required',
            'category_id.required' => 'category_id is required',
            'image.required' => 'Image is required',
            'image.mimes' => 'Image must be png, jpg, jpeg, webp'
            
          ];
    }
}

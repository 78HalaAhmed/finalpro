<?php

namespace App\Http\Controllers;

use App\Models\Testimonials;
use Illuminate\Http\Request;
use App\Traits\Common;

class TestimonialsController extends Controller
    
{
    use Common;
    private $columns = ['name', 'position','content','image','published'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials=Testimonials::get();
        return view('layout.testimonials',compact('testimonials'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layout.addTestimonials');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages=$this->messages();
        $data=$request->validate([
            'name'=>'required|string',
            'position'=>'required|string',
            'content'=>'required|string|max:200',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ], $messages);
         // Update image if new file selected
         
            $fileName = $this->uploadFile($request->image, 'userassets/images');
            $data['image'] = $fileName;
            $data['published'] = isset($request['published']); 
            Testimonials::create($data);        
            return redirect()->route('admintestimonials');
    
}

    /**
     * Display the specified resource.
     */
    public function show(Testimonials $testimonials)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $testimonials=Testimonials::findorfail($id);
        return view('layout.editTestimonials',compact('testimonials'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages=$this->messages();
        $data=$request->validate([
            'name'=>'required|string',
            'position'=>'required|string',
            'content'=>'required|string|max:200',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
        ], $messages);
         // Update image if new file selected
         if ($request->hasFile('image')) {
            $fileName = $this->uploadFile($request->image, 'userassets/images');
            $data['image'] = $fileName;}
            $data['published'] = isset($request['published']); 
            Testimonials::where('id',$id)->update($data);        
            return redirect()->route('admintestimonials');
    
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Testimonials::where('id', $id)->delete();        
        return redirect()->route('admintestimonials');
    }
    public function messages()
    {
        return [
            'name.required' => ' name is required',
            'position.required' => 'position is required',
            'content.required' => 'content is required',
            'image.required' => 'Image is required',
            'image.mimes' => 'Image must be png, jpg, jpeg, webp'
            
          ];
    }
}

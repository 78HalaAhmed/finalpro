<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Categories::get();
        return view('layout.categories',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('layout.addCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages=$this->messages();
        $date=$request->validate([
         'categoryname'=>'required|string',
        ], $messages);
        Categories::create($date);
        return redirect()->route('CategoriesList');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories=Categories::findorfail($id);
        return view('layout.editCategory',compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages=$this->messages();
        $date=$request->validate([
         'categoryname'=>'required',
        ], $messages);
        Categories::where('id',$id)->update($date);
        return redirect()->route('CategoriesList');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Categories::where('id', $id)->delete();        
        return redirect()->route('CategoriesList');
    }
    public function messages()
    {
        return [
            'categoryname.required' => 'categorynam is required',
          ];
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $columns = ['name', 'username','email','active','password'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get(); 
        return view('layout.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layout.addUser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->messages();
        $data=$request->validate([
            'name'=>'required|string',
            'username'=>'required|string',
            'email'=>'required',
            'password'=>'required'],$messages);
            $data['active'] = isset($request['active']);
            User::create($data);
            return redirect()->route('UsersList');
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
        $users = User::findOrFail($id);
        return view('layout.edituser', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    { 
        $messages = $this->messages();
        $data=$request->validate([
            'name'=>'required|string',
            'username'=>'required|string',
            'email'=>'required',
            'password'=>'required'] ,$messages);
        $data['active'] = isset($request['active']);
        User::where('id', $id)->update($data);        
        return redirect()->route('UsersList');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function messages()
    {
        return [
            'name.required' => ' name is required',
            'username.required' => 'username is required',
            'email.required' => 'email is required',
            'password.required' => 'pasword is required',
          ];
    }
}

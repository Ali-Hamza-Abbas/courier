<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $User = User::latest()->paginate(5);
        return view('Users.index',compact('User'))
            ->with('i', (request()->input('page', 1) -1) *5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'min:8|required_with:Confirm_password|same:Confirm_password',
            'Confirm_password' => 'required',
            'type' => 'required',
        ]);

        User::create($request->all());

        return redirect()->route('Users.index')
            ->with('success','User created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $student
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $User = User::find($user);
        return view('Users.show',compact('User'))
            ->with('User' , $User);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $User = User::find($id);
        return $User;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'min:8|required_with:Confirm_password|same:Confirm_password',
            'Confirm_password' => 'required',
            'type' => 'required',
        ]);

        if($user->update($request->all())){
            return redirect()->route('Users.index')
                ->with('success','User Update Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('Users.index')
            ->with('success','User Deleted Successfully');
    }

    public function get($id) {
        $User = User::find($id);
        if ($User) {
            return response()->json(['user' => $User], 200);
        } else {
            return response()->json(['error' => 'Record not found'], 404);
        }
    }
}

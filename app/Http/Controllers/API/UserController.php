<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'title' => 'required',
            'tel_mobile' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);

        return User::create([
           'first_name' => $request['first_name'],
           'last_name' => $request['last_name'],
           'title' => $request['title'],
           'tel_mobile' => $request['tel_mobile'],
           'email' => $request['email'],
           'password' => \Hash::make($request['password']),
           'role' => $request['role'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'title' => 'required',
            'tel_mobile' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);


        $user = User::findOrFail($id);

        $user->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json([
         'message' => 'User deleted successfully'
        ]);
    }
}

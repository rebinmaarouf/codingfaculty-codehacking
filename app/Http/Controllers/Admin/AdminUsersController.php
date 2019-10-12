<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\UsersRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use App\User;
use App\Role;
use App\Photo;
class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$users = User::All();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		 $roles = Role::pluck('name', 'id');
		 return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
		$input = $request->all();
		if ($file = $request->file('photo_id')) {
			$name = $file->getClientOriginalName();
			$name = time().$file->getClientoriginalName();
			$address = 'images/users/';
			$filee = $address . $name ;
			$file->move($address,$name);
			$photo =Photo::create(['filee'=>$filee]);
			$input['photo_id'] = $photo->id;
		}
		$input['password']= bcrypt($request->password);
		User::create($input);
		return redirect('/admin/users');
		/*
		User::create($request->all());
        return redirect('/admin/users');
		*/
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$roles = Role::pluck('name', 'id');
        $user = User::findOrFail($id);
		return view('admin.users.edit', compact('user','roles'));
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
		$user = User::findOrFail($id);
		$input = $request->all();
		if ($file = $request->file('photo_id')) {
			$name = $file->getClientOriginalName();
			$name = time().$file->getClientoriginalName();
			$address = 'images/users/';
			$filee = $address . $name ;
			$file->move($address,$name);
			$photo =Photo::create(['filee'=>$filee]);
			$input['photo_id'] = $photo->id;
		}
		$input['password']= bcrypt($request->password);
		
		$user->update($input);
        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

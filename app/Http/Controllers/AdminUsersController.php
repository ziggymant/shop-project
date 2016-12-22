<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Photo;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UsersEditRequest;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','id')->all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(trim($request->password) == "") {
          $input = $request->except('password');
        } else {
          $input = $request->all();
        }


        if($file = $request->file('photo_id')){
            $name = time().$file->getClientOriginalName();
            $name = str_replace(' ', '_', $name);
            $file->move('images', $name);
            $photo = Photo::create(['path'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        $input['password'] = bcrypt($request->password);

        User::create($input);

        return redirect('/admin/users');

        // return $request->all();
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
        $user = User::findOrFail($id);
        $roles = Role::pluck('name','id')->all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id)
    {
      $user = User::findOrFail($id);

      if(trim($request->password) == "") {
        $input = $request->except('password');
      } else {
        $input = $request->all();
      }
      if ($file = $request->file('photo_id')) {
          $name = time(). $file->getClientOriginalName();
          $name = str_replace(" ", "_", $name);
          $file->move('images', $name);
          $photo = Photo::create(['path'=>$name]);
          $input['photo_id'] = $photo->id;
      }
      $input['password'] = bcrypt($request->password);
      $user->update($input);
      return redirect('admin/users');
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
        unlink(public_path() . $user->photo->path);
        Session::flash('message', 'The user has been deleted');
        return redirect('admin/users');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rol;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $users=User::all();
        $roles=Role::all();
        return view('admin.user.index', compact('users','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(UserRequest $request)
    {
    /* $roles=Role::pluck('name', 'name')->all(); */
        $roles=Role::all();
        $users=User::all();
        return view('admin.user.create',compact('roles', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        
        $input= $request->all();
        
        $input['password']=Hash::make($input['password']);
        

        $users=User::create($input);
        $users->assignRole($request->input('role'));

       return redirect('/Usuarios')->with('status', '1');
       
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
    public function edit(User $users,$id)
    {
        $users=  User::find($id);
        $roles=Role::all();
        $userRole=$users->roles->pluck('name', 'name')->all();

        return view('admin.user.edit', compact('user', 'roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        /*$this->validate($request,['name'=>'required',
        'email'=>'required|email|unique:users,email'.$user->id,
        'password'=> 'same:confirm-password',
        'roles'=>'required']);*/
        $input=$request->all();

       

        if(!empty($input['password'])){
            $input['password']=Hash::make($input['password']);
        }else{
            $input= Arr::except($input,array('password'));
        }
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $user->id)->delete();

        $user->assignRole($request->input('role'));
        return redirect()->route('ListUser')->with('status', '2');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        User::find($id)->delete();
        return redirect()->route('ListUser');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Hash as FacadesHash;


class UserController extends Controller
{
    //     function __construct()
    //     {
    //         $this->middleware('permission:Users view', ['only' => ['show']]);
    //         $this->middleware('permission:Users create', ['only' => ['create', 'store']]);
    //         $this->middleware('permission:Users edit', ['only' => ['edit', 'update']]);
    //         $this->middleware('permission:Users delete', ['only' => ['destroy']]);
    //     }

    public function index(Request $request)
    {
        $data = User::orderBy('id', 'ASC')->paginate(10);
        return view('users.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|alpha_num|same:confirm-password',
            'roles' => 'required'
        ]);
        $input = $request->all();
        $input['password'] = FacadesHash::make($input['password']);
        $input['role_name'] = $request->input('roles');
        $input['created_by'] = Auth::user()->id;

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'User created successfully');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('users.edit', compact('user', 'roles', 'userRole'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = FacadesHash::make($input['password']);
        } else {
            $input = \Illuminate\Support\Arr::except($input, ['password']);
        }
        $user = User::find($id);
        $user->update($input);
        FacadesDB::table('model_has_roles')->where('model_id', $id)->delete();
        $input['role_name'] = $request->input('roles');

        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
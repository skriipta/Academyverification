<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class RoleController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware('permission:Roles view', ['only' => ['index']]);
    //     $this->middleware('permission:Roles create', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:Roles edit', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:Roles view', ['only' => ['show']]);
    //     $this->middleware('permission:Roles delete', ['only' => ['destroy']]);
    // }
    public function index(Request $request)
    {
        // $roles = Role::orderBy('id', 'ASC')->paginate(10);
        // return view('roles.index', compact('roles'))
        //     ->with('i', ($request->input('page', 1) - 1) * 10);
        return view('roles.index', [
            'roles' => Role::orderBy('id', 'ASC')->paginate(10),
            'i' => ($request->input('page', 1) - 1) * 10
        ]);
    }

    public function create()
    {
        return view('roles.create', ['permission' => Permission::get()]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);
        $role = Role::create(['guard_name' => 'web', 'name' => $request->input('name')]);
        foreach ($request->input('permission') as $permissionId) {
            $permission = Permission::find($permissionId);
            if ($permission) {
                $role->givePermissionTo($permission);
            }
        }

        return redirect()->route('roles.index')
            ->with('success', 'Role created successfully');
    }

    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get();
        return view('roles.show', compact('role', 'rolePermissions'));
    }

    public function edit($id)
    {

        if ($id == 1) {
            return redirect()->route('roles.index')->with('error', 'This role cannot be edited.');
        }
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = FacadesDB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        return view('roles.edit', compact('role', 'permission', 'rolePermissions'));
    }

    public function update(Request $request, $id)
    {
        if ($id == 1) {
            return redirect()->route('roles.index')->with('error', 'This role cannot be edited.');
        }
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
        $role->syncPermissions([]);

        foreach ($request->input('permission') as $permissionId) {
            $permission = Permission::find($permissionId);
            if ($permission) {
                $role->givePermissionTo($permission);
            }
        }
        return redirect()->route('roles.index')
            ->with('success', 'Role updated successfully');
    }

    public function destroy(Role $role)
    {
        if ($role->id == 1) {
            return redirect()->route('roles.index')->with('error', 'This role cannot be deleted.');
        }
        $role->delete();
        return redirect()->route('roles.index')
            ->with('success', 'Role deleted successfully');
    }
}
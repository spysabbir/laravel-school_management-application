<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class RolePermissionController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware('permission:role-permission.list|role-permission.create|role-permission.edit|role-permission.delete', ['only' => ['index','show']]);
    //     $this->middleware('permission:role-permission.create', ['only' => ['create','store']]);
    //     $this->middleware('permission:role-permission.edit', ['only' => ['edit','update', 'status']]);
    //     $this->middleware('permission:role-permission.delete', ['only' => ['destroy']]);
    // }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Role::select('roles.*');

            $query->orderBy('created_at', 'desc');

            $roles = $query->get();

            return DataTables::of($roles)
                ->addIndexColumn()
                ->addColumn('permissions', function ($row) {
                    $permissions = $row->permissions;
                    $badgeTags = '';
                    foreach ($permissions as $permission) {
                        $badgeTags .= '<span class="badge bg-info mx-1">' . $permission->name . '</span>';
                    }
                    return $badgeTags;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="'.route('backend.role-permission.edit', $row->id).'" class="btn btn-info btn-xs">Edit</a>
                            <button type="button" data-id="' . $row->id . '" class="btn btn-danger btn-xs deleteBtn">Delete</button>';
                    return $btn;
                })
                ->rawColumns(['permissions', 'action'])
                ->make(true);
        }

        return view('backend.role-permission.index');
    }

    public function create()
    {
        $roles = Role::all();
        $permission_groups = User::getPermissionsGroup();
        return view('backend.role-permission.create', compact('roles', 'permission_groups'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'role_id' => 'required',
            'permission_id' => 'required|array',
            'permission_id.*' => 'required|integer|exists:permissions,id',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'error'=> $validator->errors()->toArray()
            ]);
        }else{
            $exists = DB::table('role_has_permissions')
                        ->where('role_id', $request->role_id)
                        ->exists();
            if ($exists) {
                return response()->json([
                    'status' => 401,
                ]);
            } else {
                $data = array();
                $permissions = $request->permission_id;
                foreach($permissions as $item) {
                    $data['role_id'] = $request->role_id;
                    $data['permission_id'] = $item;

                    DB::table('role_has_permissions')->insert($data);
                }

                return response()->json([
                    'status' => 200,
                ]);
            }
        }
    }

    public function edit(string $id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $permission_groups = User::getPermissionsGroup();
        return view('backend.role-permission.edit', compact('role', 'permission_groups'));
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'permission_id' => 'array',
            'permission_id.*' => 'exists:permissions,id',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'error'=> $validator->errors()->toArray()
            ]);
        }else{
            $role = Role::findOrFail($id);

            $role->permissions()->sync($request->permission_id);

            return response()->json([
                'status' => 200,
            ]);
        }
    }

    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
    }
}

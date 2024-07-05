<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class BackendController extends Controller
{
    public function dashboard()
    {
        return view('backend.dashboard');
    }

    public function profileEdit(Request $request)
    {
        $user = $request->user();
        return view('profile.edit', compact('user'));
    }

    public function profileSetting(Request $request)
    {
        $user = $request->user();
        return view('profile.setting', compact('user'));
    }

    public function userList(Request $request)
    {
        if ($request->ajax()) {
            $query = User::where('user_type', 'frontend');

            if ($request->status) {
                $query->where('users.status', $request->status);
            }

            $query->select('users.*')->orderBy('created_at', 'desc');

            $allUser = $query->get();

            return DataTables::of($allUser)
                ->addIndexColumn()
                ->editColumn('last_login', function ($row) {
                    return '
                        <span class="badge text-white bg-dark">' . date('F j, Y  H:i:s A', strtotime($row->last_login_at)) ?? 'N/A' . '</span>
                        ';
                })
                ->editColumn('status', function ($row) {
                    $statusClasses = [
                        'Active' => 'bg-success',
                        'Inactive' => 'text-white bg-secondary',
                        'Blocked' => 'bg-warning',
                        'default' => 'bg-danger'
                    ];
                    $badgeClass = $statusClasses[$row->status] ?? $statusClasses['default'];
                    return '
                        <span class="badge ' . $badgeClass . '">' . $row->status . '</span>
                        <button type="button" data-id="' . $row->id . '" class="btn btn-info btn-xs editBtn" data-bs-toggle="modal" data-bs-target=".editModal">Edit</button>
                    ';
                })
                ->addColumn('action', function ($row) {
                    $btn = '
                    <button type="button" data-id="' . $row->id . '" class="btn btn-primary btn-xs viewBtn" data-bs-toggle="modal" data-bs-target=".viewModal">View</button>
                    <button type="button" data-id="' . $row->id . '" class="btn btn-danger btn-xs deleteBtn">Delete</button>
                    ';
                return $btn;
                })
                ->rawColumns(['last_login', 'status', 'action'])
                ->make(true);
        }

        return view('backend.user.index');
    }

    public function userView(string $id)
    {
        $user = User::where('id', $id)->first();
        return view('backend.user.show', compact('user'));
    }

    public function userEdit(string $id)
    {
        $user = User::where('id', $id)->first();
        return response()->json([
            'user' => $user,
        ]);
    }

    public function userUpdate(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->errors()->toArray()
            ]);
        } else {
            $user = User::findOrFail($id);
            $user->update([
                'status' => $request->status,
                'updated_by' => auth()->user()->id,
            ]);

            return response()->json([
                'status' => 200,
            ]);
        }
    }

    public function userDestroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->updated_by = auth()->user()->id;
        $user->deleted_by = auth()->user()->id;
        $user->save();
        $user->delete();
    }

    public function userTrash(Request $request)
    {
        if ($request->ajax()) {
            $query = User::where('user_type', 'frontend')->onlyTrashed();

            $trashUser = $query->orderBy('deleted_at', 'desc')->get();

            return DataTables::of($trashUser)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '
                        <button type="button" data-id="'.$row->id.'" class="btn bg-success btn-xs restoreBtn">Restore</button>
                        <button type="button" data-id="'.$row->id.'" class="btn bg-danger btn-xs forceDeleteBtn">Delete</button>
                    ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend.user.index');
    }

    public function userRestore(string $id)
    {
        User::onlyTrashed()->where('id', $id)->update([
            'deleted_by' => NULL
        ]);

        User::onlyTrashed()->where('id', $id)->restore();
    }

    public function userDelete(string $id)
    {
        $user = User::onlyTrashed()->where('id', $id)->first();
        $user->forceDelete();
    }
}

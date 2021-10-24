<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.users.edit', compact('user', 'roles', 'permissions'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'cellphone' => 'required|iran_mobile'
        ]);
        try {
            DB::beginTransaction();

            $user->update([
                'name' => $request->name,
                'cellphone' => $request->cellphone
            ]);

            $user->syncRoles($request->role);

            $permissions = $request->except('name', 'cellphone', 'role', '_token' , '_method');
            $user->syncPermissions($permissions);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            alert()->error('مشکل در ویرایش کاربر', $ex->getMessage())->persistent('حله');
            return redirect()->back();
        }

        alert()->success('کاربر مورد نظر ویرایش شد', 'با تشکر');

        return redirect()->route('admin.users.index');
        // return redirect()->back();
    }

    public function destroy($id)
    {
        //
    }
}

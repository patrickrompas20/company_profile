<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Storage;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:users.index|users.create|users.edit|users.delete']);
    }

    public function index()
    {
        // $search = request()->q;
        $users = User::latest()->when(request()->q, function ($users) {
            $users = $users->where('name', 'like', '%' . request()->q . '%');
        })->paginate(5);
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::latest()->get();
        return view('admin.user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        // upload image
        $image = $request->file('image');
        $image->storeAs('public/users', $image->hashName());

        $user = User::create([
            'image' => $image->hashName(),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        $user->assignRole($request->input('role'));

        if ($user) {
            return redirect()->route('admin.user.index')->with(['success' => 'Save Data Successfully!']);
        } else {
            return redirect()->route('admin.user.index')->with(['error' => 'Save Data Failed!']);
        }
    }
    public function edit(User $user)
    {
        $roles = Role::latest()->get();
        return view('admin.user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        // Update user data
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));

        // Update image jika ada image baru
        if ($request->hasFile('image')) {
            // Validasi image baru
            $this->validate($request, [
                'image' => 'image|mimes:jpeg,jpg,png|max:2048',
            ]);

            // Hapus image lama
            Storage::disk('local')->delete('public/users/' . basename($user->image));

            // Upload image baru
            $image = $request->file('image');
            $image->storeAs('public/users', $image->hashName());

            // Update user dengan image yang baru
            $user->image = $image->hashName();
        }
        $user->syncRoles($request->input('role'));
        $user->save();

        if ($user) {
            return redirect()->route('admin.user.index')->with(['success' => 'Update Data Successfully!']);
        } else {
            return redirect()->route('admin.user.index')->with(['error' => 'Update Data Failed!']);
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        Storage::disk('local')->delete('public/users/' . basename($user->image));
        $user->delete();

        if ($user) {
            return response()->json([
                'status' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
}

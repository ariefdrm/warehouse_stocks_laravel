<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.index', [
            'users' => User::with('role')->paginate(10),
        ]);
    }

    public function create()
    {
        return view('users.create', [
            'roles' => Roles::where('role_name', '!=', 'owner')->get(),
        ]);
    }

    public function store(Request $request)
    {
        // Proteksi tambahan (double safety)
        if (!Auth::user()->isOwner()) {
            abort(403);
        }

        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'roles_id'  => 'required|exists:roles,id',
        ]);

        User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
            'roles_id'  => $validated['roles_id'],
        ]);

        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $authUser = $request->user();

        if ($authUser->id === $user->id) {
            abort(403, 'Cannot modify your own role');
        }

        $request->validate([
            'roles_id' => 'required|exists:roles,id',
        ]);

        $user->update([
            'roles_id' => $request->roles_id,
        ]);

        return redirect()->route('users.index');
    }

    public function destroy(Request $request, User $user)
    {
        if ($request->id() === $user->id) {
            abort(403, 'Cannot delete your own account');
        }

        if ($user->role->role_name === 'owner') {
            abort(403, 'Owner account cannot be deleted');
        }

        $user->delete();

        return redirect()->route('users.index');
    }
}

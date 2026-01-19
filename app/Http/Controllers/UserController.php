<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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

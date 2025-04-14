<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(20); // 20 users per page
        return view('users.users', compact('users'));
    }
    public function store(Request $request)
    {
        $users = new User;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = bcrypt($request->password);
        $users->is_admin = $request->is_admin;
        $users->save();

        if ($users) {
            return redirect()->route('users.users')->with('success', 'User created successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to create user.');
        }
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        try {
            $user->update([
                'name'     => $request->name,
                'email'    => $request->email,
                'is_admin' => $request->is_admin ?? 0,
            ]);

            return redirect()->route('users.users')
                ->with('success', 'User updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to update user.');
        }
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.users')
            ->with('success', 'User deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function index(): View
    {
        $users = User::orderBy('name', 'asc')->paginate(10);
        $master = User::where('role', 'master')->get();
        $admin = User::where('role', 'admin')->get();
        $guru = User::where('role', 'guru')->get();
        return view('user.index', compact('users', 'master', 'admin', 'guru'));
    }

    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('user.create');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:master,admin,guru'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        event(new Registered($user));

        return redirect(route('users.index'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'role' => ['required', 'in:master,admin,guru'],
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return redirect()->route('users.index');
    }

    /**
     * Confirm and delete a user account.
     */
    public function destroy(Request $request, User $user)
    {
        $request->validate([
            'password' => 'required',
        ]);

        // Cek password admin yang sedang login
        if (!Hash::check($request->password, Auth::user()->password)) {
            return back()->withErrors(['password' => 'Password salah.']);
        }

        // Cegah admin menghapus dirinya sendiri tanpa sengaja
        if (Auth::id() == $user->id) {
            return back()->withErrors(['message' => 'Anda tidak bisa menghapus akun Anda sendiri.']);
        }

        // Cegah menghapus akun master
        if ($user->role == 'master') {
            abort(403, 'Tidak boleh menghapus akun master.');
        }


        $user->delete();

        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }
}

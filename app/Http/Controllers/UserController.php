<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Enums\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', User::class); 

        $users = User::paginate();
        return view('user.index', compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(){

        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedUser = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        $user = User::create([
            'name' => $validatedUser['name'],
            'email' => $validatedUser['email'],
            'password' => bcrypt($validatedUser['password']),
            'role' => Role::User,
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $this->authorize('view', $user);
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $this->authorize('update', $user);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $currentUser = Auth::user();
        $user = User::findOrFail($id);

        $this->authorize('update', $user);

        $validatedUser = $request->validate([
            'name' => 'nullable|string|max:50',
            'email' => 'nullable|email|unique:users,email,'.$user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);
    
        $user->update([
            'name' => $validatedUser['name'] ? $validatedUser['name'] : $user->name,
            'email' => $validatedUser['email'] ? $validatedUser['email'] : $user->email,
            'password' => $validatedUser['password'] ? bcrypt($validatedUser['password']) : $user->password,
        ]);
    
        /* if (Auth::user()->role === Role::Admin) { 
        Ajustei para centralizar o controle da autorização e verificar se role está selecionado
        */
        if (($currentUser->can('updateRole', $user)) && $request->input('role')!= null) {
            $user->update([
                'role' => $request->input('role', $user->role),
            ]);
        }

        if ($currentUser->id === $user->id && ($validatedUser['password'] != null)) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        
            return redirect()->route('login.form');
        }
    
        return redirect()->route('user.show', $user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user); 
        $user->delete();
        if (Auth::user()->id === $user->id) {
            return redirect()->route('login.form');
        }

        return redirect()->route('user.index');
 
    }
}

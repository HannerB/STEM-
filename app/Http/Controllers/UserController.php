<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserupdateRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller {

    public function index() {

        $users = User::paginate(5);
        return view('dashboard.users.index', compact('users'));

    }

    public function create() {

        $roles = Role::all();
        return view('dashboard.users.create', compact('roles'));

    }

    public function store(UserRequest $request) {
        $validator = $request->validated();
    
        if ($request->hasFile('url')) {
            $imagePath = $request->file('url')->store('public/img');
            $img = Storage::url($imagePath);
        } else {
            $img = null;
        }
    
        $user = User::create([
            'name' => $validator['name'],
            'username' => $validator['username'],
            'email' => $validator['email'],
            'password' => bcrypt($validator['password']),
            'url' => $img,
            'note' => $validator['note'] ?? null,
            'position' => $validator['position'] ?? null,
            'interest' => $validator['interest'] ?? null,
            'experience' => $validator['experience'] ?? null,
            'education' => $validator['education'] ?? null,
            'skills' => $validator['skills'] ?? null,
            'role_id' => $request->input('role_id'), // Añadir role_id
        ]);
    
        return redirect()->route('users.show', $user->id)->with('success', 'Usuario creado exitosamente.');
    }
    
    

    // Método para mostrar usuario
    public function show(User $user) {

        $user = User::findOrFail($user);
        $role = $user->role;
        $roleName = $role->name;
        $roleNameDirect = $user->role->name;
        return view('dashboard.users.show', compact('user', 'roleName'));
    }

    // Método para editar usuario
    public function edit(User $user) {
        return view('dashboard.users.edit', compact('user'));
    }

    public function update(UserupdateRequest $request, User $user) {
        $validator = $request->validated();
        $data = $request->only([
            'name', 'username', 'email', 'note', 'position', 'interest', 'experience', 'education', 'skills'
        ]);

        if ($request->filled('password')) {
            $data['password'] = bcrypt($validator['password']);
        }

        if ($request->hasFile('url')) {
            if ($user->url) {
                Storage::delete($user->url);
            }
            $imagePath = $request->file('url')->store('public/img');
            $data['url'] = Storage::url($imagePath);
        }

        $user->update($data);

        return redirect()->route('users.show', $user->id)->with('success', 'Usuario actualizado exitosamente.');
    }

    public function deactivate(User $user) {

        if (auth()->user()->id == $user->id) {
            return redirect()->route('users.index');
        }

        $user->update(['state' => 0]);

        return redirect()->route('users.index')->with('success', 'Usuario desactivado exitosamente.');
    }

    public function activate(User $user)
    {
        try {
            $user->update(['state' => 1]);

            return redirect()->route('users.index')->with('success', 'Usuario activado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', 'Ha ocurrido un error al activar el usuario.');
        }
    }


    public function loginProfes()
    {
        return view('entreprofes.loginEntre');
    }

    public function perfilProfes()
    {
        return view('entreprofes.info');
    }

    public function EntreProfes(Request $request)
{
    if ($request->isMethod('post')) {
        // Validar las credenciales
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Autenticación exitosa
            return redirect()->route('EntreProfes');
        } else {
            // Autenticación fallida
            return redirect()->back()->withErrors(['email' => 'Estas credenciales no coinciden con nuestros registros.']);
        }
    }

    $users = User::all(); // Obtener todos los usuarios

    return view('entreProfes.EntreProfes', compact('users')); // Pasar los usuarios a la vista
}


    public function CardsProfes(Request $request)
    {
        if ($request->isMethod('post')) {
            // Validar las credenciales
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                // Autenticación exitosa
                return redirect()->route('CardsProfes');
            } else {
                // Autenticación fallida
                return redirect()->back()->withErrors(['email' => 'Estas credenciales no coinciden con nuestros registros.']);
            }
        }

        return view('entreprofes.cardsProfes');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        try {
            $users = User::paginate(5);
            return view('dashboard.users.index', compact('users'));
        } 
        catch (\Exception $e) {
            abort(500, 'Error interno del servidor.');
        }
    }

    public function create() {
        try {
            $roles = Role::all();
            return view('dashboard.users.create', compact('roles'));
        } 
        catch (\Exception $e) {
            abort(500, 'Error interno del servidor.');
        }
    }

    public function store(UserRequest $request) {
        try {
            $validator = $request->validated();

            $img = null;
            if ($request->hasFile('url') && $request->file('url')->isValid()) {
                $imagePath = $request->file('url')->store('public/img');
                $img = Storage::url($imagePath);
            }

            $user = User::create([
                'name' => $validator['name'],
                'username' => $validator['username'],
                'email' => $validator['email'],
                'password' => bcrypt($validator['password']),
                'url' => $img,
                'note' => $validator['note'] ?? null,
                'position' => $validator['position'] ?? null,
                'role_id' => $request->input('role_id'),
            ]);

            if ($request->has('skills')) {
                foreach ($request->input('skills') as $skill) {
                    $user->skills()->create(['skill' => $skill]);
                }
            }

            if ($request->has('experiences')) {
                foreach ($request->input('experiences') as $experience) {
                    $user->experiences()->create(['experience' => $experience]);
                }
            }

            if ($request->has('educations')) {
                foreach ($request->input('educations') as $education) {
                    $user->educations()->create(['education' => $education]);
                }
            }

            if ($request->has('interests')) {
                foreach ($request->input('interests') as $interest) {
                    $user->interests()->create(['interest' => $interest]);
                }
            } 

            $user->roles()->attach($request->input('roles'));

            return redirect()->route('users.show', $user->id)->with('success', 'Usuario creado exitosamente.');
        } 
        catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }

    public function show(User $user)
    {
        $role = $user->role;
        $roleName = $role ? $role->name : 'N/A'; // Verificar si $role es nulo
        return view('dashboard.users.show', compact('user', 'roleName'));
    }

    public function edit(User $user)
    {
        return view('dashboard.users.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $validated = $request->validated();

        $user = User::findOrFail($id);

        $user->update([
            'name' => $validated['name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'note' => $validated['note'] ?? null,
            'position' => $validated['position'] ?? null,
        ]);

        if ($request->filled('password')) {
            $user->update([
                'password' => bcrypt($validated['password']),
            ]);
        }

        if ($request->hasFile('url')) {
            if ($user->url) {
                Storage::delete(str_replace('/storage', 'public', $user->url));
            }
            $imagePath = $request->file('url')->store('public/img');
            $img = Storage::url($imagePath);
            $user->update(['url' => $img]);
        }

        $this->updateUserAttributes($user, $validated);

        return redirect()->route('CardsProfes')->with('success', 'Perfil actualizado exitosamente');
    }


    protected function updateUserAttributes(User $user, array $validated)
    {
        if (array_key_exists('skills', $validated)) {
            $user->skills()->delete();
            foreach ($validated['skills'] as $skill) {
                $user->skills()->create(['skill' => $skill]);
            }
        }

        if (array_key_exists('experiences', $validated)) {
            $user->experiences()->delete();
            foreach ($validated['experiences'] as $experience) {
                $user->experiences()->create(['experience' => $experience]);
            }
        }

        if (array_key_exists('educations', $validated)) {
            $user->educations()->delete();
            foreach ($validated['educations'] as $education) {
                $user->educations()->create(['education' => $education]);
            }
        }

        if (array_key_exists('interests', $validated)) {
            $user->interests()->delete();
            foreach ($validated['interests'] as $interest) {
                $user->interests()->create(['interest' => $interest]);
            }
        }
    }

    public function deactivate(User $user)
    {
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
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                return redirect()->route('EntreProfes');
            } else {
                return redirect()->back()->withErrors(['email' => 'Estas credenciales no coinciden con nuestros registros.']);
            }
        }

        $users = User::all();
        return view('entreProfes.EntreProfes', compact('users'));
    }

    public function CardsProfes(Request $request, User $user)
    {
        if ($request->isMethod('post')) {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                return redirect()->route('CardsProfes');
            } else {
                return redirect()->back()->withErrors(['email' => 'Estas credenciales no coinciden con nuestros registros.']);
            }
        }

        return view('entreprofes.cardsProfes', compact('user'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index(User $model)
    {
        return Inertia::render('User/Index', [
            'users' => $model->all(),
            'count' => $model->count(),
        ]);
    }

    public function store(Request $request, User $model)
    {
        $model->create($request->validate([
                                              'name'     => 'required|string|max:255',
                                              'email'    => 'required|string|lowercase|email|max:255|unique:' . User::class,
                                              'password' => ['required', 'confirmed', Rules\Password::defaults()],
                                          ]));
        return back()->with('message', 'Usuario creado.');
    }

    public function update(Request $request, User $model, $user_id)
    {
        $validateData = $request->validate([
                                               'name'     => 'required|string|max:255',
                                               'email'    => 'required|string|lowercase|email|max:255',
                                               'password' => ['required', 'confirmed', Rules\Password::defaults()],
                                           ],
                                           [
                                               'email.unique' => "El correo ya se encuentra registrado",
                                           ]
        );

        $usuario = $model->findOrFail($user_id);
        $usuario->update($validateData);
        return back()->with('message', 'Usuario actualizado.');
    }

    public function destroy(User $model, $user_id)
    {
        $usuario = $model->findOrFail($user_id);
        $usuario->delete();
        return back()->with('message', 'Usuario eliminado.');
    }

}

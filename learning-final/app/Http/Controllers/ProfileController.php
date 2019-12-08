<?php

namespace App\Http\Controllers;

use App\Rules\StrengthPassword;
use App\User;

class ProfileController extends Controller
{
    public function index () {
		$user = auth()->user()->load('socialAccount');
		$tipo = User::select('id', 'role_id', 'name')
		->where('id', '=', auth()->user()->id)
		->get();
    	return view('profile.index', compact('user', 'tipo'));
    }

    public function update (Request $request) {
		$this->validate(request(), [
			'password' => ['confirmed', new StrengthPassword]
		]);

		$user = auth()->user();
		$user->password = bcrypt(request('password'));
		$user->promedio = request->input( 'promedio' );
		$user->carrera = request->input( 'carrera' );
		$user->puesto = $request->input( 'puesto' );
		$user->grado_academico = $request->input( 'grado_academico' );
		$user->save();
	    return back()->with('message', ['success', __("Usuario actualizado correctamente")]);
    }
}

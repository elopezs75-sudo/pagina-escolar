<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Sesion extends BaseController
{
    public function login()
    {
        return view('Sesion/login');
    }

    public function entrar()
{
    $model = new UsuarioModel();
    $usuario = $model->where('correo', $this->request->getPost('email'))->first();

    if ($usuario === null || ! password_verify($this->request->getPost('password'), $usuario['password'])) {
        return redirect()->to('/login')
                         ->with('errors', ['Correo o contraseña incorrectos'])
                         ->withInput();
    }

    if ((int) $usuario['activo'] !== 1) {
        return redirect()->to('/login')
                         ->with('errors', ['Tu cuenta está desactivada']);
    }

    session()->set([
        'usuario_id' => $usuario['id'],
        'nombre'     => $usuario['nombre'],
        'rol'        => $usuario['rol'],
    ]);

    return redirect()->to('/')->with('message', 'Inicio de sesión exitoso');
}

    public function salir()
    {
        session()->remove(['usuario_id', 'nombre', 'rol']);

        return redirect()->to('/')->with('message', 'Sesión cerrada con éxito');
    }
}
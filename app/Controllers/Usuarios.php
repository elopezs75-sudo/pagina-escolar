<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Usuarios extends BaseController
{
    public function registro()
    {
        return view('Usuarios/registro');
    }

    public function guardar()
    {
        $reglas = [
            'nombre'   => 'required',
            'email'    => 'required|valid_email|is_unique[usuarios.correo]',
            'password' => 'required|min_length[6]',
            'repetir'  => 'required|matches[password]',
        ];

        if (! $this->validate($reglas)) {
            return redirect()->back()
                             ->with('errors', $this->validator->getErrors())
                             ->withInput();
        }

        $model = new UsuarioModel();
        $model->insert([
            'nombre'   => $this->request->getPost('nombre'),
            'correo'   => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'rol'      => 'estudiante',
        ]);

        return redirect()->to('/login')->with('message', 'Cuenta creada, ya puedes iniciar sesión');
    }
}
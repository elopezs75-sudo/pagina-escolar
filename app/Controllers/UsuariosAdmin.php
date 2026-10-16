<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class UsuariosAdmin extends BaseController
{
    public function index()
    {
        $model = new UsuarioModel();

        return view('UsuariosAdmin/index', [
            'usuarios' => $model->orderBy('created_at', 'DESC')->paginate(5),
            'pager'    => $model->pager,
        ]);
    }

    public function ver($id)
    {
        $usuario = (new UsuarioModel())->find($id);

        if ($usuario === null) {
            return redirect()->to('/usuarios')->with('errors', ['Usuario no encontrado']);
        }

        return view('UsuariosAdmin/ver', ['usuario' => $usuario]);
    }

    public function nuevo()
    {
        return view('UsuariosAdmin/nuevo');
    }

    public function crear()
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

        (new UsuarioModel())->insert([
            'nombre'   => $this->request->getPost('nombre'),
            'correo'   => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'rol'      => 'estudiante',
            'activo'   => 1,
        ]);

        return redirect()->to('/usuarios')->with('message', 'Usuario creado con éxito');
    }

    public function editar($id)
    {
        $usuario = (new UsuarioModel())->find($id);

        if ($usuario === null) {
            return redirect()->to('/usuarios')->with('errors', ['Usuario no encontrado']);
        }

        return view('UsuariosAdmin/editar', ['usuario' => $usuario]);
    }

    public function actualizar($id)
    {
        $reglas = [
            'nombre'   => 'required',
            'email'    => "required|valid_email|is_unique[usuarios.correo,id,{$id}]",
            'password' => 'permit_empty|min_length[6]',
            'repetir'  => 'matches[password]',
        ];

        if (! $this->validate($reglas)) {
            return redirect()->back()
                             ->with('errors', $this->validator->getErrors())
                             ->withInput();
        }

        $datos = [
            'nombre' => $this->request->getPost('nombre'),
            'correo' => $this->request->getPost('email'),
            'activo' => $this->request->getPost('activo') ? 1 : 0,
            'rol'    => $this->request->getPost('administrador') ? 'administrador' : 'estudiante',
        ];

        if ((int) $id === (int) session('usuario_id')) {
            $datos['activo'] = 1;
            $datos['rol']    = 'administrador';
        }

        $password = $this->request->getPost('password');
        if ($password !== '' && $password !== null) {
            $datos['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        (new UsuarioModel())->update($id, $datos);

        return redirect()->to('/usuarios/' . $id)->with('message', 'Usuario actualizado con éxito');
    }

    public function eliminar($id)
    {
        if ((int) $id === (int) session('usuario_id')) {
            return redirect()->to('/usuarios')->with('errors', ['No puedes eliminar tu propia cuenta']);
        }

        (new UsuarioModel())->delete($id);

        return redirect()->to('/usuarios')->with('message', 'Usuario eliminado con éxito');
    }
}
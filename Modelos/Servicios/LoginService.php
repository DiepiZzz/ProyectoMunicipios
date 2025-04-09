<?php
namespace Modelos\Servicios;

use Illuminate\Validation\Factory as ValidatorFactory;
use Illuminate\Container\Container;
use Modelos\Repositorios\UsuarioRepositorio;
use Illuminate\Hashing\BcryptHasher;

class loginService
{
    private $repositorio;

    public function __construct()
    {
        $this->repositorio = new UsuarioRepositorio();
    }

    public function login($usernameOrEmail, $password)
    {
        $validatorFactory = Container::getInstance()->make(ValidatorFactory::class);

        $validator = $validatorFactory->make([
            'usuario' => $usernameOrEmail,
            'password' => $password
        ], [
            'usuario' => 'required|string',
            'password' => 'required|string|min:8'
        ], [
            'usuario.required' => 'Debe ingresar su usuario o correo.',
            'password.required' => 'Debe ingresar la contraseña.',
            'password.min' => 'La contraseña debe tener mínimo 8 caracteres.'
        ]);

        if ($validator->fails()) {
            return [
                'status' => 422,
                'errors' => $validator->errors()->all()
            ];
        }

        // Busca al usuario por username o email desde el repositorio
        $usuario = $this->repositorio->obtenerPorUsernameOEmail($usernameOrEmail);

        if ($usuario && password_verify($password, $usuario->password)) {
            return [
                'status' => 200,
                'message' => 'Login exitoso.',
                'usuario' => [
                    'id' => $usuario->id_usuario,
                    'nombre' => $usuario->nombre,
                    'email' => $usuario->email,
                    'username' => $usuario->username
                ]
            ];
        }

        return [
            'status' => 401,
            'message' => 'Credenciales incorrectas.'
        ];
    }
}
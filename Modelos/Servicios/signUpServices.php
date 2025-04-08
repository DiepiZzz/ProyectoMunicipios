<?php

namespace Modelos\Servicios;

require_once __DIR__ . '/../../Bootstrap.php';

use Illuminate\Validation\Factory as ValidatorFactory;
use Illuminate\Container\Container;
use Illuminate\Hashing\BcryptHasher;

require_once __DIR__ . '/../Repositorios/UsuarioRepositorio.php';
use Modelos\Entidades\Usuario;
use Modelos\Repositorios\UsuarioRepositorio;

class signUpServices {

    public function validateAndRegisterUser(Usuario $user) {
        
        
        $validatorFactory = Container::getInstance()->make(ValidatorFactory::class);

        $data = [
            'username' => $user->username,
            'password' => $user->password,
            'nombre'   => $user->nombre,
            'email'    => $user->email,
        ];

      
        $rules = [
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'nombre'   => 'required|string|min:3|max:255',
            'email'    => 'required|string|email|max:255|unique:usuarios,email',
        ];

    
        $messages = [
            'username.required' => 'El nombre de usuario es obligatorio.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.min' => 'El nombre debe tener al menos 3 caracteres.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico no es válido.',
            'email.unique' => 'Ya existe un usuario con ese correo electrónico.',
        ];

   
        $validator = $validatorFactory->make($data, $rules, $messages);

      
        if ($validator->fails()) {
            return [
                'status' => 422,
                'errors' => $validator->errors()->all()
            ];
        }

       
        $hasher = new BcryptHasher();
        $user->password = $hasher->make($user->password);

      
        $repoUser = new UsuarioRepositorio();
        $repoUser->crear($user->toArray());

     
        return [
            'status' => 200,
            'message' => 'Usuario registrado correctamente.'
        ];
    }
}


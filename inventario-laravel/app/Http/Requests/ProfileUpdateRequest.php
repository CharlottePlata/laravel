<?php

namespace App\Http\Middleware;

use App\Models\User;
use Illuminate\Foundation\Http\FormRquest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Request para validar los datos del perfil del usuario
     * asegura que el nombre y el correo cumpkan con las reglas basicas
     */
    public function rules():array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string', 
                'lowercase',
                'email', 
                'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'password' => ['nullable', 'string','confirmed', 'min:8'],
        ];

        
    }

}
<?php

namespace App\Http\Requests;

use AllowDynamicProperties;
use App\Models\Invitation;
use Illuminate\Foundation\Http\FormRequest;

#[AllowDynamicProperties] class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Verifica se o token é válido
        $invitation = Invitation::where('token', request()->get('token'))
            ->where('email',  request()->get('email'))
            ->first();

        return [
            'token' => [
                'required',
                'exists:invitations,token',
                function ($attribute, $value, $fail) use ($invitation) {
                    if ($invitation?->isExpired()) {
                        $fail('Este convite expirou. Solicite um novo convite.');
                    }
                    if ($invitation?->isUsed()) {
                        $fail('Este convite já foi utilizado.');
                    }
                }
            ],
            'role' => 'required|in:secretario,professor,auxiliar,superintendente',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users,email',
                function ($attribute, $value, $fail) use ($invitation) {
                    if ($value !== $invitation?->email) {
                        $fail('O email deve ser o mesmo para o qual o convite foi enviado.');
                    }
                }
            ],
            'name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[\pL\s\-]+$/u' // Aceita apenas letras e espaços
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
//                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/'
                // Deve conter pelo menos:
                // - 1 letra maiúscula
                // - 1 letra minúscula
                // - 1 número
                // - 1 caractere especial
            ],
        ];
    }

    public function messages()
    {
        return [
            'token.exists' => 'Token de convite inválido.',
            'email.unique' => 'Este email já está cadastrado.',
            'password.min' => 'A senha deve ter no mínimo :min caracteres.',
            'password.confirmed' => 'A confirmação de senha não corresponde.',
        ];
    }
}

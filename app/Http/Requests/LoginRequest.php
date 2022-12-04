<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|string',
            'password' => 'required|string',
        ];
    }

    public function authenticate()
    {
        $user = DB::select(
            "select * from admin where username = :username",
            [
                'username' => $this->username,
            ]
        );
        if (!$user) {
            throw ValidationException::withMessages([
                'username' => 'Username tidak ditemukan!'
            ]);
        }
        if (!Hash::check($this->password, $user[0]->password)) {
            throw ValidationException::withMessages([
                'password' => 'Password Salah!'
            ]);
        }

        return $user[0];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class ContactFormRequest extends FormRequest
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
    public function rules(){
        return [
            'f_name' => 'required|min:2|max:20|nullable',
            'l_name' => 'required|min:2|max:20',
            'password'=> ['required', Password::min(5)->mixedCase()->numbers()],
            'email'=>   'required|email'
        ];
    }

    function message(){
        return [
            'password.mixed_case'=>'A jelszónak egy kis és nagy betűt kell tartalmaznia',
        ];
    }
}

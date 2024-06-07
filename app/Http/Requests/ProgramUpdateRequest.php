<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class ProgramUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {           
                $user = Auth::check() && Auth::user()->user_type === 'admin';
                if($user){
                    return true;
                }
                else{
                    return false;
                }
        
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'program_abbreviation' => ['required', 'string', 'max:255'],
            'program_description' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255']
        ];
    }
}

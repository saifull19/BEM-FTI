<?php

namespace App\Http\Requests\Program;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Service;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class StoreProgramRequest extends FormRequest
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
            // 'service_id' => 'required|integer|max:100',
            'devisi' => 'required|string|max:255',
            // 'tugas_materi' => 'nullable|string|max:250',
            'koordinator' => 'required|string|max:5000',
            
            // 'description' => ['nullable', 'string', 'max:5000'],
        ];
    }
}

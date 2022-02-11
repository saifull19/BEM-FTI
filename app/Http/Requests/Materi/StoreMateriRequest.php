<?php

namespace App\Http\Requests\Materi;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Service;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class StoreMateriRequest extends FormRequest
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
            'service_id' => 'required|integer|max:100',
            'title' => 'required|string|max:255',
            'tugas_materi' => 'string|max:250',
            'url' => 'required|max:100'
        ];
    }
}

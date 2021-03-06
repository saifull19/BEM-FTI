<?php

namespace App\Http\Requests\Dashboard\Service;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Service;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;


class UpdateServiceRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'category_id' => ['nullable'],
            'description' => ['nullable', 'string', 'max:5000'],
            'delivery_time' => ['required', 'string', 'max:100'],
            'revision_limit' => ['required', 'string', 'max:100'],
            'price' => ['required', 'string'],
            'note' => ['nullable', 'string', 'max:5000']
        ];
    }
}

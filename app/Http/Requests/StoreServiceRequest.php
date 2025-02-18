<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
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
        return [
            'giver_id' => ['required'],
            'service_title' => ['required', 'string', 'min:5', 'max:120'],
            'service' => ['required'],
            'budget' => ['required', 'numeric'],
            'date' => ['required'],
            'start_time' => ['required'],
            'end_time' => ['required'],
            'gender' => ['required'],
            'carefor' => ['required'],
            'description'=> ['required', 'string']
        ];
    }
}

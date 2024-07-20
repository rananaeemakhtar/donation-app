<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWeeklyServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'                 =>          ['required','string','max:255'],
            // 'day'                   =>          ['required', 'in:monday,tuesday,wednesday,thursday,friday,saturday,sunday'],
            // 'start_time'            =>          ['required', 'date_format:H:i'],
            // 'end_time'              =>          ['required', 'date_format:H:i'],
            'image'                 =>          ['nullable', 'image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
            'description'           => ['required'],
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVideoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'video' => 'required|file|mimes:mp4,mov,ogg,qt|max:51200', // Max 50MB
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
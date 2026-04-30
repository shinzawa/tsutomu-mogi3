<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopValidationRequest extends FormRequest
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
            'name' => 'required|string',
            'address' => 'nullable|string',
            'description' => 'nullable|string',
            'genre' => 'required|string',
            'img_url' => 'nullable|string'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '店舗名は必須です。',
            'name.string' => '店舗名は文字列でなければなりません。',
            'address.string' => '住所は文字列でなければなりません。',
            'description.string' => '説明は文字列でなければなりません。',
            'genre.required' => 'ジャンルは必須です。',
            'genre.string' => 'ジャンルは文字列でなければなりません。',
            'img_url' => 'イメージは文字列でなければなりません。'
        ];
    }
}

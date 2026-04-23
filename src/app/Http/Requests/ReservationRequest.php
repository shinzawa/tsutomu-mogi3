<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'shop_id' => 'required|exists:shops,id',
            'date' => 'required|date',
            'time' => 'required',
            'number_of_people' => 'required|integer|min:1',
        ];
    }

    public function messages()
    {
        return [
            'shop_id.required' => '店舗IDを入力してください',
            'shop_id.exists' => '存在しない店舗IDです',
            'date.required' => '年月を入力してください',
            'date.date' => '来店日は「年：月：日」形式で入力してください',
            'time.required' => '来店時刻を入力してください',
            'number_of_people.required' => '来店人数を入力してください',
            'number_of_people.integer' => '来店人数は数値で入力してください',
            'number_of_people.min' => '来店人数は一名以上で入力してください',
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'Furigana' => 'required|string|max:255',
            'year' => 'required',
            'month' => 'required',
            'day' => 'required',
            'gender' => 'required',
            'preferContact' => "required",
            'LINEID' => "required",
            'postCode' => "required",
            'district' => "required",
            'city' => "required",
            'address' => "required",
            'apartmentName' => "required",
            'postCodeCom' => "required",
            'districtCom' => "required",
            'cityCom' => "required",
            'addressCom' => "required",
            'apartmentNameCom' => "required",
            'telephoneCom' => "required",
            'bankName' => "required",
            'branchName' => "required",
            'teleBranch' => "required",
            'typeAccount' => "required",
            'account' => "required",
            'accountName' => "required",
        ];
    }
    public function messages()
    {
        return [
            'required' => 'こちらは必須入力となります。',
            'email' => '※正しい書式でご記入ください',
            'gender.required' => '1つのみ選択可能',
            'preferContact.required' => '1つのみ選択可能',
            'typeAccount.required' => '1つのみ選択可能',
        ];
    }
}

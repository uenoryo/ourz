<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Auth\Guard;

class TeamStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Guard $auth)
    {
        if ($auth->user()) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|team_name|unique:teams|max:20',
            'display' => 'required|max:20',
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'Team IDを入力してください',
            'name.team_name'    => 'Team IDは半角英数字またはハイフンのみで入力してください',
            'name.unique'       => '入力されたTeam IDは既に使用されています',
            'name.max'          => 'Team IDは20文字以内で入力してください',
            'display.required'  => 'チーム名を入力してください',
            'display.max' => 'チーム名は20文字以内で入力してください',
        ];
    }
}

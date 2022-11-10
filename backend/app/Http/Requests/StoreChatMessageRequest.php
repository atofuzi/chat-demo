<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreChatMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // TODO:ログイン機能実装時にfalseに戻す
        // return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
          'chatMessage' =>  'required',
        ];
    }

    public function messages()
    {
      return [
        'required' => 'メッセージを入力してください'
      ]; 
    }
}

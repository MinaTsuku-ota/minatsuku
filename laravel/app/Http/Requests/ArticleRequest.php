<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // authorize メソッドではリクエストに対する権限を設定します
    // 例えば、現在ログイン中のユーザに権限が無ければ、false を返します
    public function authorize()
    {
        // 誰でも記事を編集可能(ユーザの認証は別で行っているのでこれで良い)
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    // rules メソッドでは、バリデーションルールを返します
    public function rules()
    {
        return [  // ②
            'title' => 'required|min:3',
            'body' => 'required',
            'published_at' => 'required|date',
        ];
    }
}

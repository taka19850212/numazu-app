<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReserveConsultationRequest extends FormRequest
{
    public function authorize()
    {
        // 今回は誰でもフォームを送信できるように true にします
        return true;
    }

    public function rules()
    {
        return [
            // 必須、日付形式、今日以降の日付しか許さない
            'date' => 'required|date|after_or_equal:today',
            // 必須、数字、1人以上10人以下
            'pax' => 'required|integer|min:1|max:10',
            // 必須、文字列、1000文字以内
            'message' => 'required|string|max:1000',
        ];
    }

    // エラーが出たときの「日本語の優しいメッセージ」を定義します
    public function messages()
    {
        return [
            'date.required' => 'ご希望日を選択してください。',
            'date.after_or_equal' => '本日以降の日付をご選択ください。',
            'pax.required' => '参加人数をご入力ください。',
            'pax.min' => '1名様以上でご入力ください。',
            'message.required' => 'ご希望の旅行スタイルやメッセージをご入力ください。',
        ];
    }
}
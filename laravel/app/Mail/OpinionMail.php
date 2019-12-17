<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OpinionMail extends Mailable
{
    use Queueable, SerializesModels;

    // 引数で受け取ったデータ用の変数
    protected $contact;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contact)
    {
        // 引数で受け取ったデータを変数にセット
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // dd($contact); // デバッグ用

        return $this->from('hoge@hoge.com') // 送信元
            ->subject('テスト送信') // メールタイトル
            // ->view('opinion.mail', compact('contact')); // どのテンプレートを呼び出すか
            ->view('opinion.mail')
            ->with(['contact' => $this->contact]); // withオプションでセットしたデータをテンプレートへ受け渡す
    }
}

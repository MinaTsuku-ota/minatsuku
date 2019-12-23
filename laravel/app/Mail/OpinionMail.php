<?php

namespace App\Mail;

// MailにはQueueを使う
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OpinionMail extends Mailable
{
    use Queueable, SerializesModels;

    // 引数で受け取ったデータ用の変数
    protected $request;
    protected $name; // 送信者ニックネーム

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request, $name){
        // 引数で受け取ったデータを変数にセット
        $this->request = $request;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
        // dd($this->request, $this->name); // デバッグ用

        return $this
            // ->from('minatsuku@example.com') // 送信元(MAIL_FROM_ADDRESS)
            ->subject('minatsukuユーザよりご意見・ご要望が届きました') // メールタイトル
            // ->view('opinion.mail', compact('contact')); // どのテンプレートを呼び出すか
            // メールビュー(resources/views/opinion/mail.blade.php) textだと改行がそのまま表示
            ->view('opinion.mail')
            // withオプションでセットしたデータをテンプレートへ受け渡す
            ->with(['contact' => $this->request, 'name'=>$this->name]);
    }
}

<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StoreText implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $param;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($value)
    {
        $this->param = $value;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // テキストファイル作成
        $file = sprintf('%s/%s.txt', storage_path('texts'), date('Q-Ymd-His'));
        touch($file);
        // 書き込み
        $current = file_get_contents($file);
        $current .= $this->param;
        file_put_contents($file, $current);
    }
}

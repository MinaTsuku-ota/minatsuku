<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Http\Components\FileOperation;

class GenerateTextFile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $file;
    private $max;
    private $fp;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($file, $max)
    {
        $this->file = $file;
        $this->max  = $max;
        $this->fp   = new FileOperation();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // 書き込み
        $this->fp->write($this->file, $this->max);
    }
}

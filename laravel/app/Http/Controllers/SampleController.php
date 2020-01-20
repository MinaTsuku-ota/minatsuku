<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;
use App\Jobs\StoreText;

use App\Jobs\GenerateTextFile;
use App\Http\Components\FileOperation;

class SampleController extends Controller
{
    const MAX = 3000; // ループ回数

    private $fp;

    public function __construct(){
        $this->fp = new FileOperation();
    }

    public function queues(){
        $text = Str::random(1000);

        // ジョブをディスパッチする
        $this->dispatch(new StoreText($text));

        return view('sample_queues');
    }

    // 通常処理用(同期処理)
    public function queuesNone(){
        $start = time();

        $file = $this->fp->makeTextFile();

        $this->fp->write($file, self::MAX);

        return view('sample_queues', ['start' => $start]);
    }

    // 非同期処理
    public function queuesDatabase(){
        $start = time();

        $file = $this->fp->makeTextFile();

        GenerateTextFile::dispatch($file, self::MAX);

        return view('sample_queues', ['start' => $start]);
    }
}

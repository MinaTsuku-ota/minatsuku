<?php

/*
 * 参考:Laravelのデータベースキュー投入とジョブ処理で非同期処理を実現する
 * https://www.ritolab.com/entry/37
 */

namespace App\Http\Components;

class FileOperation
{
    /**
     * テキストファイルを作成する
     * @return string
     */
    public function makeTextFile()
    {
        $file = sprintf('%s/test.txt', storage_path('texts'));
        if(file_exists($file)) unlink($file);
        touch($file);
        return $file;
    }

    /**
     * ファイルに指定回数分の追加書き込みを行う
     * @param string $file
     * @param int $max
     */
    public function write(string $file, int $max)
    {
        for($i=0; $i< $max; $i++ ) {
            $current = file_get_contents($file);
            $current .= $i;
            file_put_contents($file, $current);
        }
    }
}

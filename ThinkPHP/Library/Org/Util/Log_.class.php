<?php
namespace Org\Util;
class Log_
{
    // 打印log
     function  log_result($file,$word)
    {
        $time = strftime("%Y-%m-%d %H:%M:%S",time());
        $header = "============= 开始执行 ============\n";
        $timeText = "======= 执行时间 ".$time."=========\n\n";
        $body = var_export($word, true)."\n\n";
        $footer = "============= 执行结束 ============\n\n\n\n";
        $data = $header.$timeText.$body.$footer;
        return  file_put_contents($file, $data, FILE_APPEND);
    }

}
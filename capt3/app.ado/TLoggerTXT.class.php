<?php

class TLoggerTXT extends TLogger
{
    public function write($message)
    {
        $time = date("Y-m-d H:i:s");
        $text = "$time :: $message \n";
        $handle = fopen($this->filename, 'a');
        fwrite($handle, $text);
        fclose($handler);
    }

}
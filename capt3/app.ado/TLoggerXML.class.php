<?php

class TLoggerXML extends TLoggerXML
{
    public function write($message) {
        $time = date("Y-m-d H:i:s");
        $text = "<log> \n";
        $text .= " <time>$time</time>\n";
        $text .= "</log>\n";
        $handle = fopen($this->filename, 'a');
        fwrite($handler, $text);
        fclose($handle);
    }
}
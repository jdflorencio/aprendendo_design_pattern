<?php

class TLoggerHTML extends TLogger
{
    /**
     * classes TLoggerHtml
     * implementa o algoritmo de LOG em HTML
     * 
     * @param [type] $message
     * @return void
     */

    public function write($message) {
        $time = date("Y-m-d H:i:s");
        $text = "<p>\n";
        $text .= " <b>$time</b> : \n";
        $text .=  " <i>$message</i> <br> \n";
        $text .= "</p> \n";

        $handle = fopen($this->filename, 'a');
        fwrite($handle, $text);
        fclose($handle);
    }
}
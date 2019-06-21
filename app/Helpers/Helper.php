<?php
 
if (!function_exists('format_rupiah')) {
    /**
     * Returns a human readable file size
     *
     * @param integer $bytes
     * Bytes contains the size of the bytes to convert
     *
     * @param integer $decimals
     * Number of decimal places to be returned
     *
     * @return string a string in human readable format
     *
     * */
    function format_rupiah($number)
    {
        $hasil_rupiah = "Rp " . number_format($number,2,',','.');
        return $hasil_rupiah;

 
    }
}
<?php 

if (!function_exists('rupiah')) {
    function rupiah($uang){
        $hasil = number_format($uang,2,",",".");
        return $hasil;
    }
}
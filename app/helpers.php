<?php

function pilihan_jurusan_slug($pilihan)
{
    switch ($pilihan) {
        case 1:
            return "MM";
            break;
        case 2:
            return "BDP";
            break;
        case 3:
            return "APHP";
            break;
        default:
            return NULL;
            break;
    }
}

function pilihan_kelas_slug($pilihan)
{
    if ($pilihan == 1) {
        return 'Boarding';
    }
    return 'Regular';
}

function format_tanggal_indo($tanggal)
{
    return date('d/m/Y', strtotime($tanggal));
}
<?php

namespace App\Exports;

use App\Models\DetailPemesanan;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
// use App\Exports\FromCollection;

class DetailPemesananExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('detail_pemesanans')
        ->select(DB::raw('bahans.nama_bahan, detail_pemesanans.harga_beli, detail_pemesanans.jumlah_barang, pemesanans.tanggal_beli, pemesanans.status'))
        ->join('bahans', 'bahans.id', 'detail_pemesanans.id_bahan')
        ->join('pemesanans', 'pemesanans.id', 'detail_pemesanans.id_pemesanan')
        // ->groupBy('id_bahan')
        ->get();
    }
}

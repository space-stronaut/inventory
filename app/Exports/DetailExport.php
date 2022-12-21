<?php

namespace App\Exports;

use App\Models\DetailPemesanan;
use Maatwebsite\Excel\Concerns\FromCollection;

class DetailExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DetailPemesanan::all();
    }
}

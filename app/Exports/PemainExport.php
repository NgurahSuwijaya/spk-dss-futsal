<?php

namespace App\Exports;

use App\Models\Pemain;
use Maatwebsite\Excel\Concerns\FromCollection;

class PemainExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pemain::all();
    }
}

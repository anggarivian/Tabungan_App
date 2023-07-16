<?php

namespace App\Exports;

use App\Models\Tabungan;
use Maatwebsite\Excel\Concerns\FromCollection;

class TabunganExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tabungan::all();
    }
}

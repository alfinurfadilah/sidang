<?php

// app/Exports/DataPembayaranExport.php

namespace App\Exports;

use App\Models\DataPembayaran;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DataPembayaranExport implements FromView
{
    public function view(): View
    {
        return view('exports.data_pembayaran', [
            'datapembayaran' => DataPembayaran::all()
        ]);
    }
}

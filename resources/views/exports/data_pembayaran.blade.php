<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pembayaran</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        .column-header {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>Data Pembayaran</h2>
    <table>
        <thead>
            <tr>
                <th class="column-header">No.</th>
                <th class="column-header">Id Pelanggan</th>
                <th class="column-header">Nama</th>
                <th class="column-header">Nama Paket</th>
                <th class="column-header">Harga Paket</th>
                <th class="column-header">Bulan</th>
                <th class="column-header">Tahun</th>
                <th class="column-header">Status Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            @foreach($datapembayaran as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->id_pelanggan }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->fpaket->Nama_Paket }}</td>
                <td>Rp {{ number_format($item->harga_paket, 0, ',', '.') }}</td>
                <td>{{ $item->bulan }}</td>
                <td>{{ $item->tahun }}</td>
                <td>
                    @if($item->payment_status)
                        Sudah Dibayar
                    @else
                        Belum Dibayar
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

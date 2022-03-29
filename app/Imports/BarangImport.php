<?php

namespace App\Imports;

use App\Models\barang;
use App\Models\DataBarang;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BarangImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new DataBarang([
            "nama_barang" => $row['nama_barang'],
            "qty" => $row['qty'],
            "harga" => $row['harga'],
            "waktu_beli" => $row['waktu_beli'],
            "supplier" => $row['supplier'],
            "status" => $row['status']
        ]);
    }

    public function headingRow(): int
    {
        return 3;
    }
}

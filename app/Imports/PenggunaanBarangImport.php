<?php

namespace App\Imports;

use App\Models\PenggunaanBarang;
use App\Models\DataBarang;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PenggunaanBarangImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new PenggunaanBarang([
            "nama_barang" => $row['nama_barang'],
            "waktu_pakai" => $row['waktu_pakai'],
            "waktu_selesai_pakai" => $row['waktu_selesai_pakai'],
            "nama_pemakai" => $row['nama_pemakai'],
            "status" => $row['status']
        ]);
    }

    public function headingRow(): int
    {
        return 3;
    }
}

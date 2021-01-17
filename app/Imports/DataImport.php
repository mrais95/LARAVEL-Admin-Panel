<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Post;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DataImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Post([
            'id' => null,
            'name' => $row[0],
            'phone' => $row[1],
            'daerah' => $row[2],
            'produk' => $row[3],
            'status' => $row[4],
            'pembayaran' => $row[5]
        ]);
    }
}

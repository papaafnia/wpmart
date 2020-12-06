<?php

namespace App\Imports;

use App\Databarang\DataBarang;
use Maatwebsite\Excel\Concerns\ToModel;

class DataBarangImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DataBarang([
            //

            'nama_data_barang'          => $row[1],
            'hargapcs_data_barang'      => $row[2], 
            'qty_data_barang'           => $row[3],
            'kategori_data_barang'      => $row[4],
            'subkategori_data_barang'   => $row[5], 
            'gambar'                    => $row[6],
        ]);
    }
}

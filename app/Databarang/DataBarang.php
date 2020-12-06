<?php

namespace App\Databarang;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataBarang extends Model
{
    //
    use SoftDeletes;

    protected $table = 'model_data_barang';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_data_barang','hargapcs_data_barang','qty_data_barang'
                            ,'kategori_data_barang','subkategori_data_barang','gambar'];
    protected $date         = [
        "created_at","updated_at","deleted_at"
    ];

    public function detailsubkategori(){
        return $this->belongsTo('App\SubKategori\SubKategori','subkategori_data_barang','id');
    }

    public function detailkategori(){
        return $this->belongsTo('App\Kategori\Kategori','kategori_data_barang','id');
    }
}

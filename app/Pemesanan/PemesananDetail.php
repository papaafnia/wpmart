<?php

namespace App\Pemesanan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PemesananDetail extends Model
{
    //
    use SoftDeletes;

    protected $table = 'model_pemesanan_detail';
    protected $primaryKey = 'id';
    protected $date         = [
        "created_at","updated_at","deleted_at"
    ];

    public function nama_barang_details(){
        return $this->belongsTo('App\Databarang\DataBarang','pemesanan_detail_barang_id','id');
    }
}

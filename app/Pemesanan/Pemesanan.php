<?php

namespace App\Pemesanan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pemesanan extends Model
{
    //
    use SoftDeletes;

    protected $table = 'model_pemesanan';
    protected $primaryKey = 'id';
    protected $date         = [
        "created_at","updated_at","deleted_at"
    ];

    public function pemesan(){
        return $this->belongsTo('App\User','pemesanan_id','id');
    }

    public function pesandetail(){
        return $this->belongsTo('App\Pemesanan\PemesananDetail','pemesanan_id','id');
    }

}

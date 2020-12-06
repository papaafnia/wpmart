<?php

namespace App\SubKategori;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubKategori extends Model
{
    //
    use SoftDeletes;

    protected $table = 'model_sub_kategori';
    protected $primaryKey = 'id';
    protected $date         = [
        "created_at","updated_at","deleted_at"
    ];

    public function kategori(){
        return $this->belongsTo('App\Kategori\Kategori','kategori_id','id');
    }
}



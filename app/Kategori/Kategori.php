<?php

namespace App\Kategori;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    //

    use SoftDeletes;

    protected $table = 'model_kategori';
    protected $primaryKey = 'id';
    protected $date         = [
        "created_at","updated_at","deleted_at"
    ];
}

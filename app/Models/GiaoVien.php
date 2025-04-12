<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GiaoVien extends Model
{
    public $timestamps = false;
    public $table = 'giaovien';

    public function linhVuc()
{
    return $this->belongsTo(LinhVuc::class, 'maLV', 'maLV');
}
}

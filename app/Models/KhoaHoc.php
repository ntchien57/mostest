<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KhoaHoc extends Model
{
    public $timestamps = false;
    public $table = 'khoahoc';

    public function linhVuc()
{
    return $this->belongsTo(LinhVuc::class, 'maLV', 'maLV');
}
}

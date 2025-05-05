<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LichThi extends Model
{
    public $timestamps = false;
    public $table = 'lichthi';

    public function linhVuc()
    {
        return $this->belongsTo(LinhVuc::class, 'maLV', 'maLV');
    }
}

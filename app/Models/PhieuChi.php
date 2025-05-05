<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhieuChi extends Model
{
    public $timestamps = false;
    public $table = 'phieuchi';

    public function nhanVien()
    {
        return $this->belongsTo(NhanVien::class, 'maNV', 'maNV');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhieuThu extends Model
{
    public $timestamps = false;
    public $table = 'phieuthu';

    public function nhanVien()
    {
        return $this->belongsTo(NhanVien::class, 'maNV', 'maNV');
    }
}

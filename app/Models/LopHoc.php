<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LopHoc extends Model
{
    public $timestamps = false;
    public $table = 'lophoc';

    public function giaoVien()
{
    return $this->belongsTo(GiaoVien::class, 'maGV', 'maGV');
}

public function khoaHoc()
{
    return $this->belongsTo(KhoaHoc::class, 'maKH', 'maKH');
}

public function phongHoc()
{
    return $this->belongsTo(PhongHoc::class, 'maPH', 'maPH');
}
}

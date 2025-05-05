<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietLopHoc extends Model
{
    public $timestamps = false;
    public $table = 'chitietlophoc';

    public function hocSinh()
    {
        return $this->belongsTo(HocSinh::class, 'maHS', 'maHS');
    }

    public function lopHoc()
    {
        return $this->belongsTo(LopHoc::class, 'maLH', 'maLH');
    }

}

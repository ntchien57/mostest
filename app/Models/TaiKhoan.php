<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaiKhoan extends Model
{
    public $table = 'taikhoan';
    public $timestamps = false;
    protected $fillable = ['taikhoan', 'matkhau'];

    public function hocSinh()
{
    return $this->belongsTo(HocSinh::class, 'taikhoan', 'maHS');
}

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LienHe extends Model
{
    public $timestamps = false;
    public $table = 'lienhe';
    protected $fillable = ['tenkhach', 'email', 'sdt', 'ykien', 'ngaylienhe'];

}

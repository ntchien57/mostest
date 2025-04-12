<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopContact extends Model
{
    public $timestamps = true;
    public $table      = 'shop_contact';

    public static function getContacts()
    {
        return self::where('status', 1)->orderBy('id', 'desc')->orderBy('sort', 'desc')->get();
    }
}

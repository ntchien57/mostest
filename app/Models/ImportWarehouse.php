<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImportWarehouse extends Model
{
    public $table = 'import_warehouse';

    public function product()
    {
        return $this->belongsTo('App\Models\ShopProduct', 'product_id', 'id');
    }
}

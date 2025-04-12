<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExportWarehouse extends Model
{
    public $table = 'export_warehouse';

    public function product()
    {
        return $this->belongsTo('App\Models\ShopProduct', 'product_id', 'id');
    }
}

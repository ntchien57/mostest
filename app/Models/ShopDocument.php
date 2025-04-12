<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopDocument extends Model
{
    public $timestamps = true;
    public $table      = 'shop_document';

    public static function getDocuments()
    {
        return self::where('status', 1)->orderBy('id', 'desc')->orderBy('sort', 'desc')->get();
    }

    public function getDocumentByLimit($limit = null, $opt = null)
    {
        $query = (new ShopDocument)->where('status', 1)->orderBy('sort', 'desc')->orderBy('id', 'desc');
        if (!(int) $limit) {
            return $query->get();
        } else
        if ($opt == 'paginate') {
            return $query->paginate((int) $limit);
        } else {
            return $query->limit($limit)->get();
        }

    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['brand', 'model'];

    public function images()
    {
        return $this->belongsTo('App\Images');
    }

    /**
     * Get the list of product with images
     */
    public static function getProductsWithImages(){
        return self::query()
            ->leftjoin('images', function ($join) {
                $join->on('images.subject_id', '=', 'products.id')->where('images.type', '=', 'product');
            })
            ->selectRaw(implode(',',[
                'products.*',
                'images.subject_id',
                'images.type',
                'group_concat(images.name) as image_name',
            ]))
            ->groupBy('products.id')
            ->orderBy('products.id')
            ->get();
    }
}

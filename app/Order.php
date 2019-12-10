<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = ['publish_at', 'total'];

    public function products() {

        return $this->belongsToMany(Product::class, 'orders_products', 'order', 'product');
    }

    public function getPublishFmtAttribute() {

        return date('d/m/Y H:i', strtotime($this->publish_at));
    }

    public function setPublishAtAttribute($value) {

        $this->attributes['publish_at'] = date('Y-d-m H:i:s', strtotime($value));
    }
}

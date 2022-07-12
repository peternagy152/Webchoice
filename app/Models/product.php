<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class product extends Model
{
    use HasFactory;
    public function categories(){
       return $this -> belongsToMany(category::class);
    }
    public function brands(){
        return $this->belongsTo(brand::class);
    }
    public function product_images()
    {
        return $this->hasMany(product_image::class);
    }
}

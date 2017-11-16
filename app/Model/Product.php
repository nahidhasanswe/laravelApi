<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Review;

class Product extends Model
{
    protected $casts = ['id' => 'string'];

    protected  $fillable = ['name','detail','price','stock','discount'];

    public function reviews() 
    {
    	return $this->hasMany(Review::class);
    }
}

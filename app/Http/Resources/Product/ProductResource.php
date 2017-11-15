<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $starSum = $this->reviews->sum('star');
        $countReview = $this->reviews->count();

        if ($starSum != 0 || $countReview !=0){
           $rating = $starSum/$countReview; 
        }else {
            $rating = 0;
        }

        return 
        [
            'name' => $this->name,
            'description' => $this->detail,
            'price' => $this->price,
            'discount' => $this->discount,
            'totalPrice' => round((1- ($this->discount/100)) * $this->price,2),
            'stock' => $this->stock == 0 ? 'Out of Stock' : $this->stock,
            'rating' => $this->reviews->count() > 0 ? round($this->reviews->sum('star')/$this->reviews->count(),2) : 'Not Review Yet',
            'href' => [
                'reviews'=> route('reviews.index',$this->id),
                'product'=> route('products.show',$this->id)
            ]
        ];
    }
}

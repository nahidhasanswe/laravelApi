<?php

namespace App\Http\Resources\Review;

use Illuminate\Http\Resources\Json\Resource;
use DateTime;

class ReviewResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return 
        [
            'customer' => $this->customer,
            'reviewText' => $this->review,
            'star' => $this->star,
            'reviwedAt' => ReviewResource::formatOutput($this->created_at)
        ];
    }


    public function formatOutput($dateTime){
    /* function to return the highrst defference fount */
        $datetime1 = new DateTime();
        $datetime2 = new DateTime($dateTime);
        $diff = $datetime1->diff($datetime2);

        if(!is_object($diff)){
            return;
        }

        if($diff->y > 0){
            return $diff->y .(" year".($diff->y > 1?"s":"")." ago");
        }

        if($diff->m > 0){
            return $diff->m .(" month".($diff->m > 1?"s":"")." ago");
        }

        if($diff->d > 0){
            return $diff->d .(" day".($diff->d > 1?"s":"")." ago");
        }

        if($diff->h > 0){
            return $diff->h .(" hour".($diff->h > 1?"s":"")." ago");
        }

        if($diff->i > 0){
            return $diff->i .(" minute".($diff->i > 1?"s":"")." ago");
        }

        if($diff->s == 0 || $diff->s <= 5){
            return "Just Now";
        }

        if($diff->s > 5){
            return $diff->s .(" second".($diff->s > 1?"s":"")." ago");
        }
    }
}

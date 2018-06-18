<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellerReview extends Model
{


    public function seller()
    {
        return $this->belongsTo('App\Seller');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingMethod extends Model
{
    use HasFactory;

    protected $append = ['formatted_price'];

    function getFormattedPriceAttribute(){
        return prices($this->price);
    }
}

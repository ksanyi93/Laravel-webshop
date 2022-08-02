<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $append = ['formatted_price','formatted_name'];

    function getFormattedPriceAttribute(){
        return prices($this->price);
    }

    //formatted_price

    function getFormattedNameAttribute(){
        return '<b>'.$this->name.'</b>';
    }

    //formatted_name

    //full_name
}

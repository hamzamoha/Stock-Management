<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class History extends Model
{
    public function __construct($name = "", $sell_price = 0, $buy_price =0, $quantity = 0, $direction = "out")
    {
        $this->name = $name;
        $this->sell_price = $sell_price;
        $this->buy_price = $buy_price;
        $this->quantity = $quantity;
        $this->direction = $direction;
    }


    use HasFactory;

    protected $fillable = [
        'name',
        'quantity',
        'buy_price',
        'sell_price',
        'direction',
    ];

    function receipt() : BelongsToMany {
        if ($this->direction == "out") {
            return $this->BelongsToMany(Receipt::class, "receipt_histories");
            # code...
        } else {
            return null;
            # code...
        }
    }
}

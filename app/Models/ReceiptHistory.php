<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceiptHistory extends Model
{

    public function __construct($receipt_id = 0, $history_id = 0)
    {
        $this->receipt_id = $receipt_id;
        $this->history_id = $history_id;
    }

    use HasFactory;

    protected $fillable = [
        "receipt_id",
        "history_id",
    ];
}

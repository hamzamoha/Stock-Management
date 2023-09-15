<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Receipt extends Model
{
    public function __construct($total = 0)
    {
        $this->total = $total;
    }

    use HasFactory;

    protected $fillable = [
        "total",
        "status",
        "payment_method",
        "client_id",
    ];

    public function list() : BelongsToMany {
        return $this->BelongsToMany(History::class, "receipt_histories");
    }

    public function client() : BelongsTo {
        return $this->belongsTo(Client::class);
    }
}

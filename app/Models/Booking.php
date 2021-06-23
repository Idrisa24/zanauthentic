<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class Booking extends Model
{
    use HasFactory, Uuid;
    
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $fillable = [
        'full_name',
        'email' ,
        'quantity',
        'package',
        'booking_price',
        'expected_date',
        'status',
        'short_memo',
    ];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y H:m a',
    ];

}

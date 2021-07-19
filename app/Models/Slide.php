<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class Slide extends Model
{
    use  HasFactory, Uuid;

    protected $keyType = 'string';

    protected $fillable = [
        'slide_title',
        'slide_status',
        'slide_position',
        'slide_photo_path',
    ];

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
}


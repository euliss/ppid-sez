<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sop extends Model
{
    protected $table = 'm_sop';

    protected $primaryKey = 'id';

    public $timestamps = false; // karena kita pakai publish_date, bukan created_at/updated_at

    protected $fillable = [
        'title',
        'file',
        'status',
        'publish_date',
    ];

    protected $casts = [
        'publish_date' => 'datetime',
    ];

    // Event: set publish_date otomatis saat create
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->publish_date = now();
        });
    }
}

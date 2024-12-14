<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'body'
    ];

    protected $casts = [
        'created_at',
        'updated_at',  
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

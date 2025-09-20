<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\Permission\Traits\HasRoles;
use App\Models\User;
use App\Models\Message;

class Group extends Model
{
    use HasRoles;
    
    protected $guard_name = 'web';
    
    protected $fillable = [
        'name',
        'link',
        'created_by'
    ];
    
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
    
    public function latestMessage()
    {
        return $this->hasOne(Message::class)->latest();
    }
    
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}

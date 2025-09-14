<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupMessage extends Model
{
    protected $fillable = [
        'group_id',
        'message_id',
        'type',
        'invitation_link',
        'invited_by',
    ];
}

<?php namespace App\Traits;

use App\User;

trait BelongsToUser
{
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getUserId() {
        return $this->user_id;
    }
}
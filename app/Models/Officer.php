<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Officer extends User
{
    use HasFactory;

    protected $guarded = ['id'];

    public function responses()
    {
        return $this->hasMany(Response::class);
    }
}

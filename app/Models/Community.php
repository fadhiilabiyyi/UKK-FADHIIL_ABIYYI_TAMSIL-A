<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Community extends User
{
    use HasFactory;

    protected $guarded = ['id'];

    public function complaints()
    {
        return $this->hasMany(Complaint::class);
    }
}

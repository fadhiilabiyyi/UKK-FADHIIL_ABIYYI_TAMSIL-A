<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    public function complaint()
    {
        return $this->belongsTo(Complaint::class);
    }

    public function officer()
    {
        return $this->belongsTo(Officer::class);
    }
}

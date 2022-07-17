<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posting extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // buat relasi tabel user dengan tabel posting
    public function user()
    {
        return $this->belongsto(User::class, 'user_id', 'id');

        
    }
}

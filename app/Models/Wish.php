<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wish extends Model
{
    //
    use HasFactory;

    protected $fillable = ['name', 'message', 'photo_path'];
}

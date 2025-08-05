<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temu extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected $table = "temu";
    protected $fillable = ['temu_type'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekskul extends Model
{
    use HasFactory;
    protected $fillable = ['ekskul','deskripsi','image'];
    protected $visible = ['ekskul','deskripsi','image'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Labour extends Model
{
    public $timestamps = false;
    protected $fillable = ['labour_id', 'name', 'email', 'address','contact','password'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biding extends Model
{
    public $timestamps = false;
    protected $fillable = ['bid', 'job_id', 'labour_id'];
}

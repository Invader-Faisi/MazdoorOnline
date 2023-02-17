<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public $timestamps = false;
    protected $fillable = ['ratings', 'rating_by', 'employer_id', 'labour_id', 'assigned_job_id'];
}

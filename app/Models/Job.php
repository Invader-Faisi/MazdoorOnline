<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['title', 'location', 'rate', 'description', 'job_rate', 'status', 'employer_id'];
}
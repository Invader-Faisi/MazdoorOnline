<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'jobs';
    protected $primaryKey = 'id';

    protected $fillable = ['category', 'title', 'location', 'rate', 'description', 'job_rate', 'status', 'employer_id'];

    public function GetEmployer()
    {
        return $this->hasOne(Employer::class, 'id', 'employer_id');
    }

    public function GetBidings()
    {
        return $this->hasMany(Biding::class, 'job_id');
    }

    public function GetBid()
    {
        return $this->hasOne(Biding::class, 'job_id');
    }

    public function GetAssignedLabour()
    {
        return $this->hasOne(Assigned_Job::class, 'job_id');
    }
}

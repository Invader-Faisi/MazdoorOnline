<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assigned_Job extends Model
{
    public $timestamps = false;

    protected $table = 'assigned_jobs';
    protected $primaryKey = 'id';

    protected $fillable = ['status', 'job_id', 'labour_id', 'biding_id'];

    public function GetLabour()
    {
        return $this->hasOne(Labour::class, 'id', 'labour_id');
    }

    public function GetRatings()
    {
        return $this->hasMany(Rating::class, 'assigned_job_id');
    }

    public function GetJob()
    {
        return $this->hasOne(Job::class, 'id', 'job_id');
    }

    public function GetApprovedBid()
    {
        return $this->hasOne(Biding::class, 'id', 'biding_id');
    }

}
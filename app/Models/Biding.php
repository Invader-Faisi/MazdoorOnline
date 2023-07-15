<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biding extends Model
{
    public $timestamps = false;

    protected $table = 'bidings';
    protected $primaryKey = 'id';

    protected $fillable = ['bid', 'job_id', 'labour_id'];

    public function GetBider()
    {
        return $this->hasOne(Labour::class, 'id', 'labour_id');
    }
    public function GetBidedJobs()
    {
        return $this->hasMany(Job::class);
    }
    public function GetJob()
    {
        return $this->hasOne(Job::class, 'id', 'job_id');
    }
}

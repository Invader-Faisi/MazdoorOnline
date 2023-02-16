<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assigned_Job extends Model
{
    public $timestamps = false;

    protected $table = 'assigned_jobs';
    protected $primaryKey = 'id';

    protected $fillable = ['status', 'job_id', 'labour_id'];

    public function GetLabour()
    {
        return $this->hasOne(Labour::class, 'id', 'labour_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Labour extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'labours';
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'email', 'address', 'contact', 'password'];

    public function GetPortfolio()
    {
        return $this->hasOne(Portfolio::class);
    }
    public function GetMyJobs()
    {
        return $this->hasMany(Assigned_Job::class, 'labour_id');
    }
    public function GetRating()
    {
        return $this->hasMany(Rating::class, 'labour_id');
    }
}

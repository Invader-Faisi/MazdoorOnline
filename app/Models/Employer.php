<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'employers';
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'email', 'address', 'contact', 'password'];

    public function GetJobs()
    {
        return $this->hasMany(Job::class);
    }

    public function GetRating()
    {
        return $this->hasOne(Rating::class, 'employer_id');
    }
}

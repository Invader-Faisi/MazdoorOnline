<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'portfolios';
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'experience', 'skills', 'hourly_rate', 'status', 'labour_id'];

    public function GetLabour()
    {
        return $this->hasOne(Labour::class, 'id');
    }
}

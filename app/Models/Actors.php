<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actors extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $id;
    public $name;
    public $email;
    public $contact;
}

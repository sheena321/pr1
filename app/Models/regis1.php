<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class regis1 extends Model
{
    use HasFactory;

    protected $guarded=['id']; // or    public $fillable=['fname','lname','email','password'];
}
//gaurded means we dont need to fill that field but
// fillable means neeed to fill that field in table

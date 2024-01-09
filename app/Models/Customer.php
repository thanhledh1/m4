<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory;
    protected $table ='customers';
    protected $fillable = [
        'email', 'password','phone','name', 'address', 'google_id',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
 

}

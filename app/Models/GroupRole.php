<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupRole extends Model
{
    use HasFactory;
    protected $fillable = [
        'group_id',
        'role_id',

     ];
     public function role()
     {
         return $this->belongsTo(Role::class,'role_id','id');
     }

     

}

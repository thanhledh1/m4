<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'slug',
        'price',
        'description',
        'quantity',
        'status',
        'category_id ',
        'image',


    ];
    protected $dates =[
        'created_at',
        'updated_at',
    ];
    protected $primaryKey = 'id';
    protected $table = 'products';
    public $timestamps = true;

        public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
}

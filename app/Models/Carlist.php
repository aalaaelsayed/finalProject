<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\models\Category;

class Carlist extends Model
{
    use HasFactory,SoftDeletes;
    protected $table ='carlist';

    protected $fillable = [
        'carName',
        'content',
        'doors',
        'passengers',
        'price',
        'active',
        'image',
        'luggage',
        'categoryId',
        
        ];

        public function Category()
        {
        return $this->belongsTo (Category::class,'categoryId');
        }

}

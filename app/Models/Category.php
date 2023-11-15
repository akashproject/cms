<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','name','title','slug','excerpt','description','banner_image','featured_image','brochure_id','parent_id','meta_description','schema','robots','canonical','utm_campaign','utm_source','created_at',
    ];
}

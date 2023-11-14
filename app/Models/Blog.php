<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','category_id','author_id','name','title','slug','featured_image','description','seo_description','excerpt','category','tags','author_id','schema','enable_otp','utm_campaign','utm_source','status','created_at'
    ];
}

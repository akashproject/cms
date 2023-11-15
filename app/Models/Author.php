<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $table = 'authors';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','title','name','slug','featured_image','bio','certification','qualification','profession','organization','linkedin','schema','utm_campaign','utm_source','status','created_at'
    ];
}

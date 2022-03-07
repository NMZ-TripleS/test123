<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable =['title','sub_title','image_urls','pdf_urls','video_urls','mp3_urls','description','category_id'];

    public function categories(){
        return $this->belongsToMany(Category::class);
    }
}

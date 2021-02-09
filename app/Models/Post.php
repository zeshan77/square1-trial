<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = [
        'post_title',
        'post_description',
        'user_id',
        'published_date'
    ];

    public function user()

    {

    	return $this->belongsTo(User::class);
    }

    public function getPublishedDateAttribute()
    {
        return date('d F, Y', strtotime($this->attributes['published_date']));
    }
}

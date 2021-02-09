<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class Post extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'published_date',
    ];

    protected $casts = [
        'published_date' => 'datetime:Y-m-d',
    ];

    public function scopePublished($query)
    {
        return $query->where('published_date', '<=', now());
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}

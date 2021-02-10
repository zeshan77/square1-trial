<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'publication_date',
    ];

    protected $casts = [
        'publication_date' => 'datetime:Y-m-d',
    ];

    public static $cacheKey = 'posts';

    public function scopePublished($query)
    {
        return $query->where('publication_date', '<=', now());
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        static::addGlobalScope('current', function (Builder $builder) {
            $builder->where('user_id', auth()->id());
        });
    }
}

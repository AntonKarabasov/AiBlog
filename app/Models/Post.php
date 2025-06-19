<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'posts';
    protected $guarded = false;

    protected $withCount = ['likedUsers'];
    protected $with = ['category'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(): belongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }

    public function getPreviewImageLink(): string
    {
        return asset('storage/' . $this->attributes['preview_image']);
    }

    public function getMainImageLink(): string
    {
        return asset('storage/' . $this->attributes['main_image']);
    }

    public function likedUsers(): belongsToMany
    {
        return $this->belongsToMany(User::class, 'post_user_likes', 'post_id', 'user_id');
    }

    public function comments(): hasMany
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    public function getFormattedDateAttribute(): string
    {
        $months = [
            'января', 'февраля', 'марта', 'апреля', 'мая', 'июня',
            'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря',
        ];

        $date = $this->created_at instanceof Carbon ? $this->created_at : Carbon::parse($this->created_at);

        return $date->day . ' ' . $months[$date->month - 1] . ', ' . $date->year . ' ' . $date->format('H:i');
    }
}

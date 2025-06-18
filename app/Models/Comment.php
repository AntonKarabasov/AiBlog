<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'comments';
    protected $guarded = false;


    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function getFormattedDateAttribute(): string
    {
       return Carbon::parse($this->created_at)->diffForHumans();
    }
}

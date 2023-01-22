<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    protected $table = 'images';
    protected $fillable = ['title', 'description', 'image', 'user_id', 'approved'];
    public $timestamps = true;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function scopeApprovedImages($query)
    {
        return $query->where('approved', '=', 1)->latest();
    }

    public function scopeNotApprovedImages($query)
    {
        return $query->where('approved', '=', 0)->latest();
    }
}

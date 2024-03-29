<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'completed_at' => 'datetime',
    ];

    public function isActive(): Attribute
    {
        return Attribute::make(fn() => ($this->status === 1));
    }

    public function isCompleted(): Attribute
    {
        return Attribute::make(fn() => ($this->status === 2));
    }

//    RELATIONSHIP

    public function project(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}

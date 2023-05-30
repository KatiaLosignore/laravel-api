<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Technology extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'projects'
    ];

    public static function generateSlug(string $title) {
        return Str::slug($title, '-');
    }

    public function projects() {
        return $this->belongsToMany(Project::class);
    }
}

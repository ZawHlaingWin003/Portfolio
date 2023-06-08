<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'project_link',
        'coder',
        'overview',
        'image'
    ];

    public function getImageAttribute($value)
    {
        return asset("images/projects/$value");
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }
}

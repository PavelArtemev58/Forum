<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;
    
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}

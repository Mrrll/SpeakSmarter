<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lesson extends Model
{
    use HasFactory;    
    protected $guarded = [];
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function level() 
    {
        return $this->belongsTo(Level::class);
    }
}

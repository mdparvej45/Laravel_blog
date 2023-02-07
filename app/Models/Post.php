<?php

namespace App\Models;

use Spatie\Tags\HasTags;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, HasTags;

    public function user(){//user information relationship with post
        return $this->belongsTo(User::class);
    }
    public function category(){ //category information relationship with post
        return $this->belongsTo(Category::class);
    }
    public function subcategory(){//subcategory information relationship with post
        return $this->belongsTo(SubCategory::class);
    }

}

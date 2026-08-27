<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'address',
        'image_path',
        'price',
        'max_people',
        'reserve_date',
        'del_flg',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

     public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }
}


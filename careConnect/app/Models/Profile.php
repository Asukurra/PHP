<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $guarded = [];

    public function profileImage()
    {
        return ($this->image) ? '/storage/'.$this->image : 'https://www.bigalspets.com/blog/wp-content/uploads/2017/04/cory-catfish-1.jpg';
    }


    public function followers()
    {
        return $this->belongsToMany(User::class);
    }

    public function user()
    {
        return$this->belongsTo(User::class);
    }
}

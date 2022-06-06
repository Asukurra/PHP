<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class searchProfiles extends Model
{
    use HasFactory;

    protected $guarded =[];

    protected $fillable = [
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function  users()
    {
        return $this->hasOne(Profile::class);
    }
}

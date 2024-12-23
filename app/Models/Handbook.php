<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Handbook extends Model
{
    use HasFactory;
    protected $table = 'handbooks';
    protected $fillable = ['title', 'content', 'image', 'author'];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserId', 'id'); // doctorId là khóa ngoại trong bảng users
    }
}

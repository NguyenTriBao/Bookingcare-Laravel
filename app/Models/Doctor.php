<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $table = 'doctors';
    protected $fillable = ['doctorId', 'specialtyId', 'province', 'note', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class, 'doctorId', 'id'); // doctorId là khóa ngoại trong bảng users
    }
}

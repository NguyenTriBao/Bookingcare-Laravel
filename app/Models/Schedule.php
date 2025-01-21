<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $table = 'schedules';
    protected $fillable = ['date','doctorId'];

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctorId', 'doctorId'); // doctorId là khóa ngoại trong bảng users
    }
}

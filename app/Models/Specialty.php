<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    use HasFactory;
    protected $table = 'specialties';
    protected $fillable = ['id', 'name', 'description', 'image'];

    public function doctors()
    {
        return $this->hasMany(Doctor::class, 'specialtyId', 'id');
    }
}

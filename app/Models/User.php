<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory ;

    protected $table = 'users';
    protected $fillable = ['id', 'email', 'password', 'firstName', 'lastName', 'address', 'phoneNumber', 'gender','roleId'];

    public function doctor()
    {
        return $this->hasOne(Doctor::class, 'doctorId', 'id'); // id là khóa chính trong bảng users
    }
}

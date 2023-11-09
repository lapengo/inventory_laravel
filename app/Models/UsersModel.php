<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $fillable = ['username', 'password', 'email'];
    protected $primaryKey = 'id';
    protected $guarded = [];

    use HasFactory;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Member extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'member';
    
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'address',
        'phone',
        'created_at',
        'updated_at'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Book extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'book';
    
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'title',
        'author',
        'published_year',
        'loan_status',
        'created_at',
        'updated_at'
    ];



    public function detailLoan()
    {
        return $this->belongsTo(DetailLoan::class, 'id_book');
    }

    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class DetailLoan extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'detail_loan';
    
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'id_loan',
        'id_book',
        'created_at',
        'updated_at'
    ];

    public function detailLoans()
    {
        return $this->belongsTo(Loan::class, 'id');
    }

    public function book()
    {
        return $this->hasMany(Book::class, 'id');
    }

}

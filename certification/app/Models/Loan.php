<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;


// model loan
class Loan extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'loan';
    
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'id_member',
        'borrowed_date',
        'due_date',
        'returned_date',
        'loan_status',
        'created_at',
        'updated_at'
    ];

    public function detailLoans()
    {
        return $this->hasMany(DetailLoan::class, 'id_loan');
    }
    
    public function member() {
        return $this->belongsTo(Member::class, 'id_member', 'id');
    }
}

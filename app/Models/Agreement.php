<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    use HasFactory;

    protected $dates = ['disbursement_date', 'expected_first_payment_date'];

    public function loanType()
    {
        return $this->belongsTo(Loan::class, 'loan_type', 'id');
    }

    public function loanee()
    {
        return $this->belongsTo(User::class, 'loanee_id', 'id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'agreement_id', 'id');
    }
}

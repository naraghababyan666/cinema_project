<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentToSystem extends Model
{
    use HasFactory;
    protected $fillable = [
      'user_id', 'card_number_extrafintech', 'bank_name', 'card_number_receiver', 'inn', 'kpp', 'bik', 'all_income', 'wanted_total', 'balance'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}

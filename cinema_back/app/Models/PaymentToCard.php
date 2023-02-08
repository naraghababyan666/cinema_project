<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentToCard extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'bank_name',
        'card_number_receiver',
        'inn',
        'kpp',
        'bik',
        'all_income',
        'wanted_total',
        'balance',
        'user_id',
    ];
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

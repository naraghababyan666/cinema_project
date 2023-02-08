<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentToRequisite extends Model
{
    use HasFactory;
    protected $fillable = [
        'organization_name',
        'bank_name',
        'payment_account',
        'correspondent_account',
        'ogrn',
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

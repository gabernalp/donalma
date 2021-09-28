<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'transactions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'merchant',
        'state_pol',
        'response_code_pol',
        'reference_sale',
        'reference_pol',
        'extra_1',
        'extra_2',
        'payment_method',
        'payment_method_type',
        'installments_number',
        'value',
        'tax',
        'transaction_date',
        'email_buyer',
        'cus',
        'pse_bank',
        'description',
        'billing_address',
        'shipping_address',
        'phone',
        'account_number_ach',
        'account_type_ach',
        'administrative_fee',
        'administrative_fee_base',
        'administrative_fee_tax',
        'authorization_code',
        'bank',
        'billing_city',
        'billing_country',
        'commision_pol',
        'commision_pol_currency',
        'customer_number',
        'date',
        'ip',
        'payment_methodid',
        'payment_request_state',
        'pse_reference_1',
        'pse_reference_2',
        'pse_reference_3',
        'response_message_pol',
        'transaction_bank',
        'transaction',
        'payment_method_name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function transactionAutomaticDebts()
    {
        return $this->hasMany(AutomaticDebt::class, 'transaction_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

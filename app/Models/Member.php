<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const CATEGORY_SELECT = [
        'jaibhim20'  => 'ஜெய்பீம் 2.0',
        'individual' => 'தனி நபர்',
    ];

    public const TYPE_SELECT = [
        'single_payment'    => 'ஒரே தவணை',
        'three_installment' => 'மூன்று தவணை',
    ];

    public const PAYMENT_METHOD_SELECT = [
        'Net Banking' => 'Net Banking',
        'Cheque'      => 'Cheque',
        'Paypal'      => 'Paypal',
        'Cash'        => 'Cash',
        'UPI'         => 'UPI',
    ];

    public $table = 'members';

    protected $dates = [
        'created_at',
        'payment_date',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'category',
        'type',
        'name',
        'email',
        'phone',
        'address',
        'created_at',
        'district_id',
        'block_id',
        'panchayat_id',
        'camp',
        'reference_number',
        'payment_method',
        'payment_date',
        'amount',
        'remarks',
        'updated_at',
        'deleted_at',
    ];

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function block()
    {
        return $this->belongsTo(Block::class, 'block_id');
    }

    public function panchayat()
    {
        return $this->belongsTo(Panchayat::class, 'panchayat_id');
    }

    public function getPaymentDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setPaymentDateAttribute($value)
    {
        $this->attributes['payment_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

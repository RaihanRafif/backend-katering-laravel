<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CateringSubscription extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'booking_trx_id',
        'name',
        'phone',
        'email',
        'delivery_time',
        'proof',
        'post_code',
        'city',
        'notes',
        'address',
        'total_amount',
        'price',
        'duration',
        'quantity',
        'total_tax_amount',
        'is_paid',
        'started_at',
        'ended_at',
        'catering_package_id',
        'catering_tier_id',
    ];

    protected $casts = [
        'started_at' => 'date',
        'ended_at' => 'date'
    ];

    public static function generateUniqueTrxId()
    {
        $prefix = 'KTRBRKH';
        do {
            $randomString = $prefix . mt_rand(1000, 9999);
        } while (self::where('booking_trx_id', $randomString)->exists());

        return $randomString;
    }

    public function cateringPackage(): BelongsTo
    {
        return $this->belongsTo(CateringPackage::class, 'catering_package_id');
    }

    public function cateringTier(): BelongsTo
    {
        return $this->belongsTo(CateringTier::class, 'catering_tier_id');
    }
}

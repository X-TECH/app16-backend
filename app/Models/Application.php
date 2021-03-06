<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string qr_token
 * @property string device_token
 *
 * @property string first_name
 * @property string middle_name
 * @property string last_name
 *
 * @property Carbon out_datetime
 * @property string out_address
 *
 * @property string visiting_address_and_name
 * @property string visiting_reason
 * @property Carbon planned_return_datetime
 *
 * @property Carbon finished_at
 */
class Application extends Model
{
    protected $table = 'applications';

    protected $fillable = [
        'device_token',

        'first_name',
        'middle_name',
        'last_name',
    ];

    protected $dates = [
        'out_datetime',
        'planned_return_datetime',
        'finished_at',
    ];

    public function getIsFinishedAttribute(): bool
    {
        return $this->finished_at !== null;
    }

    public function scopeCurrent(Builder $builder): Builder
    {
        return $builder->where('finished_at', null);
    }

    public function scopeDeviceToken(Builder $builder, string $device_token): Builder
    {
        return $builder->where('device_token', $device_token);
    }

    public function scopeQrToken(Builder $builder, string $qr_token): Builder
    {
        return $builder->where('qr_token', $qr_token);
    }
}

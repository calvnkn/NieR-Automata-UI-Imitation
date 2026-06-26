<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class YoRHaUnit extends Model
{
    protected $table = 'yorha_units';

    protected $fillable = [
        'unit_id',
        'unit_type',
        'access_key',
    ];

    protected $hidden = [
        'access_key',
    ];

    public function checkAccessKey(string $accessKey): bool
    {
        return Hash::check($accessKey, $this->access_key);
    }
}
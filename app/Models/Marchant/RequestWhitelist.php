<?php

namespace App\Models\Marchant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestWhitelist extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'whitelist_requests';

    protected $fillable = [
        'id',
        'user_id',
        'mobile_number',
        'status',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];
}

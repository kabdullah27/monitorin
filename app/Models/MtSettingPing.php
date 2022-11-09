<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\TraitUuid;

class MtSettingPing extends Model
{
    use TraitUuid;

    protected $fillable = ['ping_count', 'ping_interval', 'ping_packet_size', 'ping_timeout', 'time_ttl', 'is_active', 'created_by', 'updated_by'];
}

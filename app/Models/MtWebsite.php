<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\TraitUuid;

class MtWebsite extends Model
{
    use TraitUuid;

    protected $fillable = ['website_domain_name', 'website_name', 'is_active', 'created_by', 'updated_by'];
}
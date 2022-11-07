<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravolt\Suitable\AutoFilter;
use Laravolt\Suitable\AutoSearch;
use Laravolt\Suitable\AutoSort;

class User extends \Laravolt\Platform\Models\User
{
    use AutoFilter;
    use AutoSearch;
    use AutoSort;
    use HasFactory;
    use Notifiable;

    /**
     * @var array<int, string>
     */
    protected $hidden = ['password', 'remember_token'];

    protected $fillable = ['name', 'email', 'username', 'password', 'status', 'timezone'];

    public function employee(){
        return  $this->belongsTo('App\Models\MtEmployee');
    }

    public function attendance(){
        return  $this->hasMany('App\Models\MtAttendance');
    }

    public function schedule(){
        return  $this->hasMany('App\Models\MtSchedule');
    }

    public function upload_schedule(){
        return  $this->hasMany('App\Models\MtUploadSchedule');
    }
}

<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

use Auth;

use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use LogsActivity;

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

     protected static $recordEvents = [ 'updated', 'deleted'];

     protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'email_verified_at'
     ];


    protected $guarded = [
        'id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->useLogName(Auth::user()->name)->logOnly(['name', 'email', 'user_role.role_user'])->setDescriptionForEvent(fn(string $eventName) => "This Users has been {$eventName}");
        
    }

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    


    // relation one to one
    public function detail_user()
    {
        return $this->hasOne('App\Models\DetailUser', 'users_id');
    }

    // relation one to many
    public function service()
    {
        return $this->hasMany('App\Models\Service', 'users_id');
    }

    public function webinar()
    {
        return $this->hasMany('App\Models\Webinar', 'users_id');
    }

    public function order()
    {
        return $this->hasMany('App\Models\OrderWebinar', 'member_id');
    }

    public function order_buyer()
    {
        return $this->hasMany('App\Models\Order', 'buyer_id');
    }

    public function order_freelancer()
    {
        return $this->hasMany('App\Models\Order', 'freelancer_id');
    }
    
    public function akses_materi()
    {
        return $this->hasMany('App\Models\AksesMateri', 'users_id');
    }
    
    public function tugas_materi()
    {
        return $this->hasMany('App\Models\TugasMateri', 'users_id');
    }
    

    // mengembalikan relationship one to many
    public function user_role()
    {
        return $this->belongsTo('App\Models\UserRole', 'user_role_id', 'id');
    }

    public function materi()
    {
        return $this->hasMany('App\Models\Materi', 'users_id');
    }

    public function program()
    {
        return $this->hasMany('App\Models\ProgramKerja', 'users_id');
    }
}

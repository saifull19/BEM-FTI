<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

use Auth;

class Webinar extends Model
{
    // use HasFactory;
    use SoftDeletes, LogsActivity;

    public $table = 'webinar';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at'
    ];

    protected $guarded = [
        'id'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->useLogName(Auth::user()->name)->logOnly(['title'])->setDescriptionForEvent(fn(string $eventName) => "This Webinars has been {$eventName}");
        
    }

    // mengembalikan relationship one to many
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'users_id', 'id');
    }   
    
    public function status()
    {
        return $this->belongsTo('App\Models\WebinarStatus', 'status_id', 'id');
    }

    // menjadi object relationship one to many
    public function order() 
    {
        return $this->hasMany('App\Models\OrderWebinar', 'webinar_id');
    }
    
    // menjadi object relationship one to many
    public function thumbnail() 
    {
        return $this->hasMany('App\Models\ThumbnailWebinar', 'webinar_id');
    }

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
}

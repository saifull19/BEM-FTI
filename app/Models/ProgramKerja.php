<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

use Auth;

class ProgramKerja extends Model
{
    use SoftDeletes,  LogsActivity;

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
        return LogOptions::defaults()->useLogName(Auth::user()->name)->logOnly(['devisi'])->setDescriptionForEvent(fn(string $eventName) => "This Program Kerja has been {$eventName}");
        
    }

    // mengembalikan relationship
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'users_id', 'id');
    }
    

    // menjadi objeck relationship
    public function detail_program()
    {
        return $this->hasMany('App\Models\DetailProgramKerja', 'devisi_id');
    }
    
    
}

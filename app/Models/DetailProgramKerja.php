<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use Auth;

class DetailProgramKerja extends Model
{
    use HasFactory;

    protected $dates = [
        'updated_at',
        'created_at'
    ];

    protected $guarded = [
        'id'
    ];

    // mengembalikan relationship
    public function program_kerja()
    {
        return $this->belongsTo('App\Models\ProgramKerja', 'devisi_id', 'id');
    }
    

    // menjadi objeck relationship
    public function status_program()
    {
        return $this->hasMany('App\Models\StatusProgram', 'program_id');
    }
    
    
}

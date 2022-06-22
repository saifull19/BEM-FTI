<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusProgram extends Model
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
    public function detail_program()
    {
        return $this->belongsTo('App\Models\DetailProgramKerja', 'program_id', 'id');
    }
}

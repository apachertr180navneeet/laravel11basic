<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCompany extends Model
{
    /** @use HasFactory<\Database\Factories\SubCompanyFactory> */
    use HasFactory , SoftDeletes;


    protected $fillable = [
        'name', 'status'
    ];
}

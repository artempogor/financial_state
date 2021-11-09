<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
 protected $table = 'reports';
    protected $fillable = [
        'ikul',
        'name_report',
        'data',
    ];
    protected $casts = [
        'data' => 'array',
    ];

}

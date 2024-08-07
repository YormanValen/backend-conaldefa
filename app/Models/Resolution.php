<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resolution extends Model
{
    protected $fillable = [
        'title',
        'content',
        'resolution_date',
        'pdf_file',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportData extends Model
{
    use HasFactory;

    protected $fillable = [
        'rank',
        'name',
        'gender',
        'irtg',
        'club',
        'type',
        'point',
        'bh1',
        'bh2',
        'sb',
        'res',
        'vict',
    ];
}

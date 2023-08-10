<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Newsletter extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'newsletter';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $fillable = [
        'email',
        'name',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

}

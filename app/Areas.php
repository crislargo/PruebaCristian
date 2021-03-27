<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Areas extends Model
{
    //
    public $timestamps = false;

    protected $table = 'areas';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',

    ];

    protected $guarded = [];
}

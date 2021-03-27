<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    //
    public $timestamps = false;

    protected $table = 'empleados';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'email',
        'sexo',
        'area_id',
        'boletin',
        'descripcion'
    ];


    protected $guarded = [];

    public function area()
    {
        return $this->belongsTo(Areas::class, 'area_id','id');
    }
}

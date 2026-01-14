<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * La tabla asociada al modelo.
     */
    protected $table = 'categories';

    /**
     * Los atributos que se pueden asignar masivamente.
     * (Esto es seguridad: solo dejamos llenar estos campos)
     */
    protected $fillable = [
        'name', 'description', 'parent_id'
    ];
}
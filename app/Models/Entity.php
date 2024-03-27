<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    use HasFactory;

    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'entity';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'api',
        'description',
        'link',
        'category_id'
    ];
}

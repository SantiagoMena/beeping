<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Executed extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'executed';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['total_orders', 'total_cost'];
}

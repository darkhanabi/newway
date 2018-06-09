<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    /**
     *
     * @var string
     */
    protected $table = 'hero';

    protected $fillable = ['name', 'class', 'role', 'hit_points', 'attack', 'defense', 'attack_speed', 'move_speed', 'image'];
}

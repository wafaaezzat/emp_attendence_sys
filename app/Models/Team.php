<?php

namespace App\Models;

use App\Traits\TeamTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory,TeamTrait;
}

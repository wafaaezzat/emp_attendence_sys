<?php

namespace App\Models;

use App\Traits\ClientTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory,ClientTrait;
    protected $table = 'clients';
    protected $guarded = [];
}

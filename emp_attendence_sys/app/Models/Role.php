<?php

namespace App\Models;

use App\Traits\RoleTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Role extends Model
{
    use  HasFactory, RoleTrait;
    protected $table = 'roles';
    protected $guarded = [];
    const NAME = [
        'ADMIN' => '1',
        'Employee' => '2'
    ];
}

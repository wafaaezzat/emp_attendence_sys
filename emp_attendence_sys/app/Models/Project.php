<?php

namespace App\Models;

use App\Traits\ProjectTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Project extends Model
{
    use HasFactory, ProjectTrait;
    protected $table = 'projects';
    protected $guarded = [];

    const STATUS = [
        'CANCEL'    => '0',
        'CREATED'   => '1',
        'DONE'      => '2'
    ];

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student_mysql extends Model
{
    protected $connection = 'mysql';
    protected $table = 'students';
}

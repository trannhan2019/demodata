<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student_sqlsrv extends Model
{
    protected $connection = 'sqlsrv';
    protected $table = 'Students';
}

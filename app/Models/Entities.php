<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Label;

class Entities extends Model
{
    use HasFactory;

    protected $table = 'entities';
    protected $guarded = false;

}

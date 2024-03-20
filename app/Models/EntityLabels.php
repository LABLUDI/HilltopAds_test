<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntityLabels extends Model
{
    use HasFactory;

    protected $table = 'entity_labels';
    protected $guarded = false;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Labels extends Model
{
    use HasFactory;

    protected $table = 'labels';
    protected $guarded = false;


    public function entities()
    {
        return $this->belongsToMany(Entities::class, 'entity_labels', 'label_id', 'entity_id');
    }
}

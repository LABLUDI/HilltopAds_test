<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entities extends Model
{
    use HasFactory;

    protected $table = 'entities';
    protected $guarded = false;

    public function labels(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Labels::class, 'entity_labels', 'entity_id', 'label_id');
    }

}

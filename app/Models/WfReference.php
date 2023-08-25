<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WfReference extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function transworkflow()
    {
        return $this->hasMany(Transworkflow::class);
    }
}

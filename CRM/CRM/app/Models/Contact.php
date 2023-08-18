<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Contact extends Model
{
    use HasFactory;

    public function activites() :HasMany {
        return $this->hasMany(Activity::class);
    }
}

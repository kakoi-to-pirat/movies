<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    protected  $fillable = ['title'];

    /**
     * @return BelongsToMany
     */
    public function films(): BelongsToMany
    {
        return $this->belongsToMany(
            Film::class,
            'film_tag',
            'tag_id',
            'film_id'
        );
    }
}

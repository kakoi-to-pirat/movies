<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property mixed films
 */
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

    /**
     * @param $ids
     */
    public function setFilms($ids): void
    {
        $this->films()->sync($ids);
    }

    /**
     * @return string
     */
    public function getFilmsTitles()
    {
        $filmsTitles = $this->films->pluck('title')->all();

        if (!empty($filmsTitles)) {
            return implode(', ', $filmsTitles);
        };

        return 'Нет фильмов';
    }
}

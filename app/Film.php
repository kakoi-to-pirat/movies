<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable = ['title', 'year'];

    /**
     * @return BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(
            Tag::class,
            'film_tag',
            'film_id',
            'tag_id'
        );
    }

    /**
     * @param $fields
     * @return static
     */
    public static function add($fields): object
    {
        $film = new static;
        $film->fill($fields);
        $film->save();

        return $film;
    }

    /**
     * @param $fields
     */
    public function edit($fields): void
    {
        $this->fill($fields);
        $this->save();
    }

    /**
     * @throws \Exception
     */
    public function remove(): void
    {
        $this->delete();
    }

    /**
     * @param $ids
     */
    public function setTags($ids): void
    {
        if ($ids === null) {
            return;
        }

        $this->tags()->sync($ids);
    }
}

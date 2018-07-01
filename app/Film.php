<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed tags
 */
class Film extends Model
{
    protected $fillable = ['title', 'year'];

    public function tags()
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

    public function getTagsTitles()
    {
        $tagsTitles = $this->tags->pluck('title')->all();

        if (!empty($tagsTitles)) {
            return implode(', ', $tagsTitles);
        };

        return 'Нет тегов';
    }
}

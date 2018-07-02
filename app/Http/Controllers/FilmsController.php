<?php

namespace App\Http\Controllers;

use App\Entity\Tag;
use App\Entity\Film;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FilmsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $films = Film::get()->sortBy('title');
        $tags = Tag::get()->sortBy('title');

        return view('films.index', [
            'films' => $films,
            'tags' => $tags
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $tags = Tag::pluck('title', 'id')->all();

        return view('films.create', [
            'tags' => $tags
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:films|max:255',
            'year' => 'required',
            'tags' => 'required'
        ]);

        $film = Film::add($request->all());
        $film->setTags($request->get('tags'));

        return redirect()->route('films.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $film = Film::find($id);
        $tags = Tag::pluck('title', 'id')->all();
        $selectedTags = $film->tags->pluck('id')->all();

        return view('films.edit', [
            'film' => $film,
            'tags' => $tags,
            'selectedTags' => $selectedTags
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'year' => 'required',
            'tags' => 'required'
        ]);

        $film = Film::find($id);
        $film->update($request->all());
        $film->setTags($request->get('tags'));

        return redirect()->route('films.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Film::find($id)->delete();

        return redirect()->route('films.index');
    }

    /**
     * @param Request $request
     * @return Response|null
     */
    public function getFilmTags(Request $request)
    {
        if (!$request->get('filmId')) {
            return redirect()->route('films.index');
        }

        $film = Film::find($request->get('filmId'));
        $selectedTags = $film->tags->pluck('title', 'id')->all();

        if (!empty($selectedTags)) {
            return $selectedTags;
        }

        return null;
    }
}

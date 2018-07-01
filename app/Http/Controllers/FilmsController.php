<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Film;
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


    public function index()
    {
        $films = Film::get()->sortBy('title');
        $tags = Tag::get()->sortBy('title');

        return view('films.index', [
            'films' => $films,
            'tags' => $tags
        ]);
    }

    public function create()
    {
        $tags = Tag::pluck('title', 'id')->all();

        return view('films.create', [
            'tags' => $tags
        ]);
    }

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

    public function destroy($id)
    {
        Film::find($id)->delete();

        return redirect()->route('films.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Film;

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
        $films = Film::all();

        return view('films.index', [
            'films' => $films
        ]);
    }

    public function create()
    {
        return view('films.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'year' => 'required',
        ]);

        Film::create($request->all());

        return redirect()->route('films.index');
    }

    public function edit($id)
    {
        $film = Film::find($id);
        return view('films.edit', [
            'film' => $film
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'year' => 'required',
        ]);

        $film = Film::find($id);
        $film->update($request->all());

        return redirect()->route('films.index');
    }

    public function destroy($id)
    {
        Film::find($id)->delete();
        return redirect()->route('films.index');
    }
}

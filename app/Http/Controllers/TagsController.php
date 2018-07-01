<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();

        return view('tags.index', [
            'tags' => $tags
        ]);
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:tags|max:255',
        ]);

        Tag::create($request->all());

        return redirect()->route('tags.index');
    }

    public function edit($id)
    {
        $tags = Tag::find($id);
        return view('tags.edit', [
            'tag' => $tags
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
        ]);

        $tags = Tag::find($id);
        $tags->update($request->all());

        return redirect()->route('tags.index');
    }

    public function destroy($id)
    {
        Tag::find($id)->delete();
        return redirect()->route('tags.index');
    }
}

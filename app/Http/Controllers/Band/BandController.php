<?php

namespace App\Http\Controllers\Band;

use App\Http\Controllers\Controller;
use App\Models\Band;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BandController extends Controller
{
    public function table()
    {
        return view('bands.table', [
            'bands' => Band::latest()->paginate(16)
        ]);
    }
    public function create()
    {
        return view('bands.create', [
            'genres' => Genre::get()
        ]);
    }
    
    public function store()
    {
        request()->validate([
            'thumbnail' =>'nullable|image|mimes:jpeg,png,gif',
            'name' =>'required',
            'genres' => 'required|array',
        ]);

        $band = Band::create([
            'thumbnail' => request()->file('thumbnail')->store('images/band'),
            'slug' => Str::slug(request()->slug),
            'name' => request()->name,
        ]);

        $band->genres()->sync(request()->genres);

        return back()->with('success', 'Band was created');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
      //  $games = Game::all();
      $search = $request->get('search');
      $games = Game::query();

      if($search){
        $games->where('name', 'LIKE', "%{$search}%")
               ->orWhere('price','LIKE',"%{$search}%");
      }
        $games = $games->paginate(10);
        return view('index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'price' => 'required',
            ]);
            $show = Game::create($validatedData);
       
            return redirect('/games')->with('success', 'Game is successfully saved');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $game = Game::findorFail($id);
        return view('edit', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required'
        ]);
        Game::whereId($id)->update($validateData);
        return redirect('/games')->with('success', 'Game Data is Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $game = Game::findOrFail($id);
         $game->delete();

         return redirect('/games')->with('success','Game Data is successfully deleted');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index() // Return all players
    {
        $players = Player::all();
        return response()->json($players);
    }

    public function store(Request $request) // Create a new player
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:players,email',
            'telefone' => 'nullable|string|max:20',
        ]);

        $player = Player::create($validated);
        return response()->json($player, 201);
    }

    public function show(Player $player) // Return a specific player
    {
        $player = Player::findOrFail($player);
        return response()->json($player);
    }

    public function update(Request $request, Player $player) // Update a specific player
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:players,email,',
            'telefone' => 'nullable|string|max:20',
        ]);

        $player->update($validatedData);
        return response()->json($player);
    }

    public function delete(Player $player) // Delete a specific player
    {
        $player = Player::findOrFail($player->id);
        $player->delete();
        return response()->json(null, 204);
    }


}


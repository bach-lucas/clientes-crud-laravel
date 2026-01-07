<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController
{
    public function index() // Return all players
    {
        $players = Player::all();
        return response()->json($players);
    }

    public function store(Request $request) // Create a new player
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'telefone' => 'nullable|string',
        ]);

        $player = Player::create($validated);
        return response()->json($player, 201);
    }

    public function show(Player $player) // Return a specific player
    {
        return response()->json($player);
    }

    public function update(Request $request, Player $player) // Update a specific player
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'telefone' => 'nullable|string',
        ]);

        $player->update($validatedData);
        return response()->json($player);
    }

    public function delete(Player $player) // Delete a specific player
    {
        $player->delete();
        return response()->json(null, 204);
    }


}


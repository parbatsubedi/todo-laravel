<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource (user's todos).
     */
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $todos = $user->todos()->with('user')->latest()->get();

        return response()->json([
            "status" => true,
            "message" => "Todos fetched successfully",
            "data" => $todos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'completed' => 'boolean',
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();
        $todo = $user->todos()->create($validated);

        return response()->json($todo, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        if ($todo->user_id !== Auth::id()) {
            abort(403);
        }

        return response()->json($todo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        if ($todo->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'string|max:255',
            'description' => 'nullable|string',
            'completed' => 'boolean',
        ]);

        $todo->update($validated);

        return response()->json([
            "status" => true,
            "message" => "Todo updated successfully",
            "data" => $todo
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        if ($todo->user_id !== Auth::id()) {
            abort(403);
        }

        $todo->delete();

        return response()->json([
            "status" => true,
            "message" => "Todo deleted successfully",
            "data" => null
        ]);
    }
}


<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    // Show all dishes with optional search functionality
    public function index(Request $request)
    {
        $search = $request->get('search'); // Get search query from request

        if ($search) {
            // Filter dishes based on search query
            $dishes = Dish::where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%")
                ->paginate(10); // Paginate results
        } else {
            // Show all dishes if no search query
            $dishes = Dish::paginate(10); // Paginate results
        }

        return view('dishes.index', compact('dishes'));
    }

    // Show create dish form
    public function create()
    {
        return view('dishes.create');
    }

    // Store a new dish
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'quantity' => 'required|integer|min:0',
        ]);

        Dish::create($request->all());
        return redirect()->route('dishes.index')->with('success', 'Dish added successfully');
    }

    // Show edit form for a dish
    public function edit(Dish $dish)
    {
        return view('dishes.edit', compact('dish'));
    }

    // Update dish information
    public function update(Request $request, Dish $dish)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'quantity' => 'required|integer|min:0',
        ]);

        $dish->update($request->all());
        return redirect()->route('dishes.index')->with('success', 'Dish updated successfully');
    }

    // Delete a dish
    public function destroy(Dish $dish)
    {
        $dish->delete();
        return redirect()->route('dishes.index')->with('success', 'Dish deleted successfully');
    }
}

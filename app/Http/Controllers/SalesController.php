<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Sale;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    // Show all sales
    public function index()
    {
        // Fetch all sales with related dish information
        $sales = Sale::with('dish')->get();

        // Pass the sales data to the view
        return view('sales.index', compact('sales'));
    }

    // Handle the selling of a dish
    public function sell(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $dish = Dish::findOrFail($id);

        // Check if enough quantity is available
        if ($dish->quantity < $request->quantity) {
            return redirect()->back()->with('error', 'Not enough stock available');
        }

        // Update dish quantity
        $dish->quantity -= $request->quantity;
        $dish->save();

        // Record the sale
        Sale::create([
            'dish_id' => $dish->id,
            'quantity' => $request->quantity,
            'amount' => $dish->price * $request->quantity, // Calculate the sale amount
        ]);

        return redirect()->route('dishes.index')->with('success', 'Dish sold successfully');
    }
}

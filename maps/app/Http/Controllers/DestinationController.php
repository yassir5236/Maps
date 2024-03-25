<?php
// app/Http/Controllers/DestinationController.php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index()
    {
        return Destination::all();
    }

    public function store(Request $request)
    {
        return Destination::create($request->all());
    }

    public function show($id)
    {
        return Destination::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $destination = Destination::findOrFail($id);
        $destination->update($request->all());
        return $destination;
    }

    public function destroy($id)
    {
        $destination = Destination::findOrFail($id);
        $destination->delete();
        return response()->json(['message' => 'Destination deleted successfully']);
    }
}

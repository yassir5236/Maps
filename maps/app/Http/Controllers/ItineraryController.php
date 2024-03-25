<?php

// app/Http/Controllers/ItineraryController.php

namespace App\Http\Controllers;

use App\Models\Itinerary;
use Illuminate\Http\Request;

class ItineraryController extends Controller
{
    public function index()
    {
        return Itinerary::all();
    }

    public function store(Request $request)
    {
        // Valider les données
        $validatedData = $request->validate([
            'titre' => 'required|string',
            'categorie' => 'required|string',
            'duree' => 'required|string',
            'image' => 'nullable|string',
        ]);

        // Créer un nouvel itinéraire
        $itineraire = new Itinerary();
        $itineraire->titre = $validatedData['titre'];
        $itineraire->categorie = $validatedData['categorie'];
        $itineraire->duree = $validatedData['duree'];
        $itineraire->image = $validatedData['image'];
        $itineraire->save();

        return response()->json(['message' => 'Itinéraire créé avec succès'], 201);
    }

    public function show($id)
    {
        return Itinerary::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $itinerary = Itinerary::findOrFail($id);
        $itinerary->update($request->all());
        return $itinerary;
    }

    public function destroy($id)
    {
        $itinerary = Itinerary::findOrFail($id);
        $itinerary->delete();
        return response()->json(['message' => 'Itinerary deleted successfully']);
    }
}

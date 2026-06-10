<?php

namespace App\Http\Controllers;

use App\Models\VehicleType;
use Illuminate\Http\Request;

class VehicleTypeController extends Controller
{
    public function index()
    {
        return view('vehicle_types.index', [
            'vehicleTypes' => VehicleType::all(),
        ]);
    }

    public function create()
    {
        return view('vehicle_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required|in:motorcycle,car,other',
            'perjam_pertama' => 'required|integer|min:0',
            'perjam_berikutnya' => 'required|integer|min:0',
            'max_perhari' => 'required|integer|min:0',
        ]);

        VehicleType::create($request->only([
            'jenis',
            'perjam_pertama',
            'perjam_berikutnya',
            'max_perhari',
        ]));

        return redirect()->route('vehicle-types.index')
            ->with('success', 'New Vehicle Type was successfully saved!');
    }

    public function edit(VehicleType $vehicleType)
    {
        //
    }

    public function update(Request $request, VehicleType $vehicleType)
    {
       //
    }

    public function destroy(VehicleType $vehicleType)
    {
       //
    }
}

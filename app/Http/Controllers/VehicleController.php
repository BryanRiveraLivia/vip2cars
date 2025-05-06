<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Redirect;

class VehicleController extends Controller
{
    // ----------- VISTAS CON INERTIA (React) -----------

    public function index()
    {
        $vehicles = Vehicle::all();
        return Inertia::render('Vehicles/Index', [
            'vehicles' => $vehicles
        ]);
    }

    public function create()
    {
        return Inertia::render('Vehicles/Create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'placa' => ['required', 'regex:/^[A-Za-z0-9-]+$/'],
            'marca' => ['required', 'regex:/^[A-Za-z0-9 ]+$/'],
            'modelo' => ['required', 'regex:/^[A-Za-z0-9 ]+$/'],
            'anio_fabricacion' => ['required', 'digits:4'],
            'nombre_cliente' => ['required', 'regex:/^[A-Za-z ]+$/'],
            'apellidos_cliente' => ['required', 'regex:/^[A-Za-z ]+$/'],
            'documento_cliente' => ['required', 'digits_between:8,15'],
            'correo_cliente' => ['required', 'email'],
            'telefono_cliente' => ['required', 'digits_between:6,9'],
        ]);

        Vehicle::create($data);
         return redirect::route('vehicles.index')->with('success', 'Vehículo registrado');
    }

    public function edit(Vehicle $vehicle)
    {
        return Inertia::render('Vehicles/Edit', [
            'vehicle' => $vehicle->makeHidden(['created_at', 'updated_at'])
        ]);
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $data = $request->validate([
            'placa' => ['required', 'regex:/^[A-Za-z0-9-]+$/'],
            'marca' => ['required', 'regex:/^[A-Za-z0-9 ]+$/'],
            'modelo' => ['required', 'regex:/^[A-Za-z0-9 ]+$/'],
            'anio_fabricacion' => ['required', 'digits:4'],
            'nombre_cliente' => ['required', 'regex:/^[A-Za-z ]+$/'],
            'apellidos_cliente' => ['required', 'regex:/^[A-Za-z ]+$/'],
            'documento_cliente' => ['required', 'digits_between:8,15'],
            'correo_cliente' => ['required', 'email'],
            'telefono_cliente' => ['required', 'digits_between:6,9'],
        ]);

        $vehicle->update($data);
        return redirect::route('vehicles.index')->with('success', 'Vehículo actualizado');
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect::route('vehicles.index')->with('success', 'Vehículo eliminado');
    }

    // ----------- API REST (JSON) -----------

    public function apiIndex()
    {
        return Vehicle::all();
    }

    public function apiStore(Request $request)
    {
       $data = $request->validate([
            'placa' => ['required', 'regex:/^[A-Za-z0-9-]+$/'],
            'marca' => ['required', 'regex:/^[A-Za-z0-9 ]+$/'],
            'modelo' => ['required', 'regex:/^[A-Za-z0-9 ]+$/'],
            'anio_fabricacion' => ['required', 'digits:4'],
            'nombre_cliente' => ['required', 'regex:/^[A-Za-z ]+$/'],
            'apellidos_cliente' => ['required', 'regex:/^[A-Za-z ]+$/'],
            'documento_cliente' => ['required', 'digits_between:8,15'],
            'correo_cliente' => ['required', 'email'],
            'telefono_cliente' => ['required', 'digits_between:6,9'],
        ]);
        return Vehicle::create($data);
    }

    public function apiShow(Vehicle $vehicle)
    {
        return $vehicle;
    }

    public function apiUpdate(Request $request, Vehicle $vehicle)
    {
       $data = $request->validate([
            'placa' => ['required', 'regex:/^[A-Za-z0-9-]+$/'],
            'marca' => ['required', 'regex:/^[A-Za-z0-9 ]+$/'],
            'modelo' => ['required', 'regex:/^[A-Za-z0-9 ]+$/'],
            'anio_fabricacion' => ['required', 'digits:4'],
            'nombre_cliente' => ['required', 'regex:/^[A-Za-z ]+$/'],
            'apellidos_cliente' => ['required', 'regex:/^[A-Za-z ]+$/'],
            'documento_cliente' => ['required', 'digits_between:8,15'],
            'correo_cliente' => ['required', 'email'],
            'telefono_cliente' => ['required', 'digits_between:6,9'],
        ]);
        $vehicle->update($data);
        return $vehicle;
    }

    public function apiDestroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return response()->json(['success' => true]);
    }
}
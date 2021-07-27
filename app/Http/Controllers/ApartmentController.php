<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApartmentStoreRequest;
use App\Models\Apartment;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $apartments = Apartment::all();

        return view('', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ApartmentStoreRequest $request
     * @return Application|Factory|View
     */
    public function store(ApartmentStoreRequest $request)
    {
        try
        {
            Apartment::create([
                'number' => $request->input('number'),
                'type' => $request->input('type'),
                'floor' => $request->input('floor'),
                'meter_number' => $request->input('meter_number'),
                'rent' => $request->input('rent'),
                'rent_deposit' => $request->input('rent_deposit'),
                'water_deposit' => $request->input('water_deposit'),
                'status' => $request->input('status'),
            ]);

            Log::info('Apartment created');

            session()->flash('success', 'Apartment created successfully');
        }
        catch(Exception $e)
        {
            Log::error('Apartment not created');

            Log::error($e);

            session()->flash('error', 'Error while saving. Kindly try again');
        }

        return view();
    }

    /**
     * Display the specified resource.
     *
     * @param  Apartment  $apartment
     * @return Application|Factory|View
     */
    public function show(Apartment $apartment)
    {
        return view('', compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Apartment $apartment
     * @return Application|Factory|View
     */
    public function edit(Apartment $apartment)
    {
        return view('', compact('apartment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Apartment $apartment
     * @return Application|Factory|View
     */
    public function update(Request $request, Apartment $apartment)
    {
        try
        {
            $apartment->fill([
                'number' => $request->input('number'),
                'type' => $request->input('type'),
                'floor' => $request->input('floor'),
                'meter_number' => $request->input('meter_number'),
                'rent' => $request->input('rent'),
                'rent_deposit' => $request->input('rent_deposit'),
                'water_deposit' => $request->input('water_deposit'),
                'status' => $request->input('status'),
            ])->save();

            Log::info('Apartment updated');

            session()->flash('success', 'Apartment updated successfully');
        }
        catch(Exception $e)
        {
            Log::error('Apartment not created');

            Log::error($e);

            session()->flash('error', 'Error while updating details. Kindly try again');
        }

        return view('');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Apartment $apartment
     * @return Application|Factory|View
     */
    public function destroy(Apartment $apartment)
    {
        try
        {
            $apartment->delete();

            Log::info('Apartment deleted');

            session()->flash('success', 'Apartment deleted successfully');

        }
        catch (Exception $e)
        {
            Log::error('Apartment not deleted');

            Log::error($e);

            session()->flash('error', 'Error while deleting. Kindly try again');
        }

        return view('');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\WaterPaymentStoreRequest;
use App\Models\WaterPayment;
use App\Models\Tenant;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WaterPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $water = WaterPayment::all();

        return view('', compact('water'));
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
     * @param  WaterPaymentStoreRequest  $request
     * @return Application|Factory|View
     */
    public function store(WaterPaymentStoreRequest $request)
    {
        try
        {
            $water = new WaterPayment([
                'meter_reading' => $request->input('meter_reading'),
                'units_spent' => $request->input('units_spent'),
                'amount' => $request->input('amount'),
                'method' => $request->input('method'),
                'date_paid' => $request->input('date_paid'),
                'date_read' => $request->input('date_read')
            ]);

            $tenant = Tenant::find($request->input('tenant'));

            $tenant->waterPayments()->save($water);

            Log::info('Water bill recorded');

            session()->flash('success', 'Water bill recorded successfully');
        }
        catch (Exception $e)
        {
            Log::error('Water bill not recorded');

            Log::error($e);

            session()->flash('error', 'Error while saving. Kindly try again');
        }

        return view();
    }

    /**
     * Display the specified resource.
     *
     * @param WaterPayment $water
     * @return Application|Factory|View
     */
    public function show(WaterPayment $water)
    {
        return view('', compact('water'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param WaterPayment $water
     * @return Application|Factory|View
     */
    public function edit(WaterPayment $water)
    {
        return view('', compact('water'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param WaterPayment $water
     * @return Application|Factory|View
     */
    public function update(Request $request, WaterPayment $water)
    {
        try
        {
            $water->fill([
                'meter_reading' => $request->input('meter_reading'),
                'units_spent' => $request->input('units_spent'),
                'amount' => $request->input('amount'),
                'method' => $request->input('method'),
                'date_paid' => $request->input('date_paid'),
                'date_read' => $request->input('date_read')
            ])->save();

            Log::info('Water record updated');

            session()->flash('success', 'Water bill updated successfully');
        }
        catch (Exception $e)
        {
            Log::error('Water bill not updated');

            Log::error($e);

            session()->flash('error', 'Error while saving. Kindly try again');
        }

        return view();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param WaterPayment $water
     * @return Application|Factory|View
     */
    public function destroy(WaterPayment $water)
    {
        try
        {
            $water->delete();

            Log::info('Water bill record deleted');

            session()->flash('success', 'Water bill record deleted successfully');

        }
        catch (Exception $e)
        {
            Log::error('Water bill record not deleted');

            Log::error($e);

            session()->flash('error', 'Error while deleting. Kindly try again');
        }

        return view('');
    }
}

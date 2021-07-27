<?php

namespace App\Http\Controllers;

use App\Http\Requests\RentPaymentStoreRequest;
use App\Models\RentPayment;
use App\Models\Tenant;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RentPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $rent = RentPayment::all();

        return view('', compact('rent'));
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
     * @param  RentPaymentStoreRequest  $request
     * @return Application|Factory|View
     */
    public function store(RentPaymentStoreRequest $request)
    {
        try
        {
            $rent = new RentPayment([
                'amount' => $request->input('amount'),
                'payment_method' => $request->input('payment_method'),
                'date_paid' => $request->input('date_paid')
            ]);

            $tenant = Tenant::find($request->input('tenant'));

            $tenant->rentPayments()->save($rent);

            Log::info('Rent recorded');

            session()->flash('success', 'Rent recorded successfully');
        }
        catch (Exception $e)
        {
            Log::error('Rent not recorded');

            Log::error($e);

            session()->flash('error', 'Error while saving. Kindly try again');
        }

        return view();
    }

    /**
     * Display the specified resource.
     *
     * @param RentPayment $rent
     * @return Application|Factory|View
     */
    public function show(RentPayment $rent)
    {
        return view('', compact('rent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param RentPayment $rent
     * @return Application|Factory|View
     */
    public function edit(RentPayment $rent)
    {
        return view('', compact('rent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param RentPayment $rent
     * @return Application|Factory|View
     */
    public function update(Request $request, RentPayment $rent)
    {
        try
        {
            $rent->fill([
                'amount' => $request->input('amount'),
                'payment_method' => $request->input('payment_method'),
                'date_paid' => $request->input('date_paid')
            ])->save();

            Log::info('Rent record updated');

            session()->flash('success', 'Rent updated successfully');
        }
        catch (Exception $e)
        {
            Log::error('Rent not updated');

            Log::error($e);

            session()->flash('error', 'Error while saving. Kindly try again');
        }

        return view();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param RentPayment $rent
     * @return Application|Factory|View
     */
    public function destroy(RentPayment $rent)
    {
        try
        {
            $rent->delete();

            Log::info('Rent record deleted');

            session()->flash('success', 'Rent record deleted successfully');

        }
        catch (Exception $e)
        {
            Log::error('Rent record not deleted');

            Log::error($e);

            session()->flash('error', 'Error while deleting. Kindly try again');
        }

        return view('');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepositStoreRequest;
use App\Models\Deposit;
use App\Models\Tenant;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $deposit = Deposit::all();

        return view('', compact('deposit'));
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
     * @param  DepositStoreRequest  $request
     * @return Application|Factory|View
     */
    public function store(DepositStoreRequest $request)
    {
        try
        {
            $deposit = new Deposit([
                'type' => $request->input('type'),
                'amount' => $request->input('amount'),
                'date_paid' => $request->input('date_paid')
            ]);

            $tenant = Tenant::find($request->input('tenant'));

            $tenant->deposits()->save($deposit);

            Log::info('Deposit recorded');

            session()->flash('success', 'Deposit recorded successfully');
        }
        catch (Exception $e)
        {
            Log::error('Deposit not recorded');

            Log::error($e);

            session()->flash('error', 'Error while saving. Kindly try again');
        }

        return view();
    }

    /**
     * Display the specified resource.
     *
     * @param Deposit $deposit
     * @return Application|Factory|View
     */
    public function show(Deposit $deposit)
    {
        return view('', compact('deposit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Deposit $deposit
     * @return Application|Factory|View
     */
    public function edit(Deposit $deposit)
    {
        return view('', compact('deposit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Deposit $deposit
     * @return Application|Factory|View
     */
    public function update(Request $request, Deposit $deposit)
    {
        try
        {
            $deposit->fill([
                'type' => $request->input('type'),
                'amount' => $request->input('amount'),
                'date_paid' => $request->input('date_paid')
            ])->save();

            Log::info('Deposit record updated');

            session()->flash('success', 'Deposit updated successfully');
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
     * @param Deposit $deposit
     * @return Application|Factory|View
     */
    public function destroy(Deposit $deposit)
    {
        try
        {
            $deposit->delete();

            Log::info('Deposit record deleted');

            session()->flash('success', 'Deposit record deleted successfully');

        }
        catch (Exception $e)
        {
            Log::error('Deposit record not deleted');

            Log::error($e);

            session()->flash('error', 'Error while deleting. Kindly try again');
        }

        return view('');
    }
}

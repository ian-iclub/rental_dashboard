<?php

namespace App\Http\Controllers;

use App\Http\Requests\RefereeStoreRequest;
use App\Models\Referee;
use App\Models\Tenant;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RefereeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $referee = Referee::all();

        return view('', compact('referee'));
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
     * @param  RefereeStoreRequest  $request
     * @return Application|Factory|View
     */
    public function store(RefereeStoreRequest $request)
    {
        try
        {
            $referee = new Referee([
                'name' => $request->input('name'),
                'address' => $request->input('address'),
                'phone' => $request->input('phone')
            ]);

            $tenant = Tenant::find($request->input('tenant'));

            $tenant->referees()->save($referee);

            Log::info('Referee recorded');

            session()->flash('success', 'Referee recorded successfully');
        }
        catch (Exception $e)
        {
            Log::error('Referee not recorded');

            Log::error($e);

            session()->flash('error', 'Error while saving. Kindly try again');
        }

        return view();
    }

    /**
     * Display the specified resource.
     *
     * @param Referee $referee
     * @return Application|Factory|View
     */
    public function show(Referee $referee)
    {
        return view('', compact('referee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Referee $referee
     * @return Application|Factory|View
     */
    public function edit(Referee $referee)
    {
        return view('', compact('referee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Referee $referee
     * @return Application|Factory|View
     */
    public function update(Request $request, Referee $referee)
    {
        try
        {
            $referee->fill([
                'name' => $request->input('name'),
                'address' => $request->input('address'),
                'phone' => $request->input('phone')
            ])->save();

            Log::info('Referee record updated');

            session()->flash('success', 'Referee updated successfully');
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
     * @param Referee $referee
     * @return Application|Factory|View
     */
    public function destroy(Referee $referee)
    {
        try
        {
            $referee->delete();

            Log::info('Referee record deleted');

            session()->flash('success', 'Referee record deleted successfully');

        }
        catch (Exception $e)
        {
            Log::error('Referee record not deleted');

            Log::error($e);

            session()->flash('error', 'Error while deleting. Kindly try again');
        }

        return view('');
    }
}

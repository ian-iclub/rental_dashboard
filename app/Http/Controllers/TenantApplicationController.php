<?php

namespace App\Http\Controllers;

use App\Http\Requests\TenantApplicationStoreRequest;
use App\Models\TenantApplication;
use App\Models\Tenant;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class TenantApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $tenant_application = TenantApplication::all();

        return view('', compact('tenant_application'));
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
     * @param  TenantApplicationStoreRequest  $request
     * @return Application|Factory|View
     */
    public function store(TenantApplicationStoreRequest $request)
    {
        try
        {
            $tenant_application = new TenantApplication([
                'current_location' => $request->input('current_location'),
                'duration_stayed' => $request->input('duration_stayed'),
                'landlord_details' => $request->input('landlord_details'),
                'landlord_name' => $request->input('landlord_details') ? $request->input('landlord_name') : null,
                'landlord_phone' => $request->input('landlord_details') ? $request->input('landlord_phone') : null,
                'landlord_address' => $request->input('landlord_details') ? $request->input('landlord_address') : null,
                'moving_reason' => $request->input('moving_reason'),
                'current_rent' => $request->input('current_rent'),
                'current_house_type' => $request->input('current_house_type'),
                'duration_staying' => $request->input('duration_staying'),
            ]);

            $tenant = Tenant::find($request->input('tenant'));

            $tenant->tenantApplications()->save($tenant_application);

            Log::info('TenantApplication recorded');

            session()->flash('success', 'TenantApplication recorded successfully');
        }
        catch (Exception $e)
        {
            Log::error('TenantApplication not recorded');

            Log::error($e);

            session()->flash('error', 'Error while saving. Kindly try again');
        }

        return view();
    }

    /**
     * Display the specified resource.
     *
     * @param TenantApplication $tenant_application
     * @return Application|Factory|View
     */
    public function show(TenantApplication $tenant_application)
    {
        return view('', compact('tenant_application'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TenantApplication $tenant_application
     * @return Application|Factory|View
     */
    public function edit(TenantApplication $tenant_application)
    {
        return view('', compact('tenant_application'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param TenantApplication $tenant_application
     * @return Application|Factory|View
     */
    public function update(Request $request, TenantApplication $tenant_application)
    {
        try
        {
            $tenant_application->fill([
                'current_location' => $request->input('current_location'),
                'duration_stayed' => $request->input('duration_stayed'),
                'landlord_details' => $request->input('landlord_details'),
                'landlord_name' => $request->input('landlord_details') ? $request->input('landlord_name') : null,
                'landlord_phone' => $request->input('landlord_details') ? $request->input('landlord_phone') : null,
                'landlord_address' => $request->input('landlord_details') ? $request->input('landlord_address') : null,
                'moving_reason' => $request->input('moving_reason'),
                'current_rent' => $request->input('current_rent'),
                'current_house_type' => $request->input('current_house_type'),
                'duration_staying' => $request->input('duration_staying'),
            ])->save();

            Log::info('TenantApplication record updated');

            session()->flash('success', 'TenantApplication updated successfully');
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
     * @param TenantApplication $tenant_application
     * @return Application|Factory|View
     */
    public function destroy(TenantApplication $tenant_application)
    {
        try
        {
            $tenant_application->delete();

            Log::info('TenantApplication record deleted');

            session()->flash('success', 'TenantApplication record deleted successfully');

        }
        catch (Exception $e)
        {
            Log::error('TenantApplication record not deleted');

            Log::error($e);

            session()->flash('error', 'Error while deleting. Kindly try again');
        }

        return view('');
    }
}

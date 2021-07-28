<?php

namespace App\Http\Controllers;

use App\Http\Requests\TenantMateStoreRequest;
use App\Models\Tenant;
use App\Models\TenantMate;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class TenantMateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $tenant_mates = TenantMate::all();

        return view('', compact('tenant_mates'));
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
     * @param TenantMateStoreRequest $request
     * @return Application|Factory|View
     */
    public function store(TenantMateStoreRequest $request)
    {
        try
        {
            $tenant_mate = new TenantMate([
                'name' => $request->input('name'),
                'phone' => $request->input('phone')
            ]);

            $tenant = Tenant::find($request->input('tenant'));

            $tenant->tenantMates()->save($tenant_mate);

            Log::info('Tenant mate added');

            session()->flash('success', 'Tenant mate added successfully');
        }
        catch (Exception $e)
        {
            Log::error('Tenant mate not added');

            Log::error($e);

            session()->flash('error', 'Error while saving. Kindly try again');
        }

        return view();
    }

    /**
     * Display the specified resource.
     *
     * @param TenantMate $tenant_mate
     * @return Application|Factory|View
     */
    public function show(TenantMate $tenant_mate)
    {
        return view('', compact('tenant_mate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TenantMate $tenant_mate
     * @return Application|Factory|View
     */
    public function edit(TenantMate $tenant_mate)
    {
        return view('', compact('tenant_mate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param TenantMate $tenant_mate
     * @return Application|Factory|View
     */
    public function update(Request $request, TenantMate $tenant_mate)
    {
        try
        {
            $tenant_mate->fill([
                'name' => $request->input('name'),
                'phone' => $request->input('phone')
            ])->save();

            Log::info('Tenant mate updated');

            session()->flash('success', 'Tenant mate updated successfully');
        }
        catch (Exception $e)
        {
            Log::error('Tenant mate not updated');

            Log::error($e);

            session()->flash('error', 'Error while updating details. Kindly try again');
        }

        return view();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param TenantMate $tenant_mate
     * @return Application|Factory|View
     */
    public function destroy(TenantMate $tenant_mate)
    {
        try
        {
            $tenant_mate->delete();

            Log::info('Tenant mate deleted');

            session()->flash('success', 'Tenant mate deleted successfully');

        }
        catch (Exception $e)
        {
            Log::error('Tenant mate not deleted');

            Log::error($e);

            session()->flash('error', 'Error while deleting. Kindly try again');
        }

        return view('');
    }
}

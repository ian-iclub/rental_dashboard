<?php

namespace App\Http\Controllers;

use App\Http\Requests\TenantStoreRequest;
use App\Models\Apartment;
use App\Models\Tenant;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;


class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $tenants = Tenant::all();

        return view('', compact('tenants'));
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
     * @param  TenantStoreRequest  $request
     * @return Application|Factory|View
     */
    public function store(TenantStoreRequest $request)
    {
        try
        {
            $path = Storage::putFileAs(env('TENANT_PHOTOS_LIB'), $request->file('photo'), $request->input('filename'));

            $tenant = new Tenant([
                'name' => $request->input('name'),
                'address' => $request->input('address'),
                'phone' => $request->input('phone'),
                'photo' => $path,
            ]);

            $apartment = Apartment::find($request->input('apartment'));

            $apartment->tenant()->save($tenant);

            Log::info('Tenant added');

            session()->flash('success', 'Tenant added successfully');

        }
        catch (Exception $e)
        {
            Log::error('Tenant not added');

            Log::error($e);

            session()->flash('error', 'Error while saving. Kindly try again');
        }

        return view();
    }

    /**
     * Display the specified resource.
     *
     * @param Tenant $tenant
     * @return Application|Factory|View
     */
    public function show(Tenant $tenant)
    {
        return view('', compact('tenant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Tenant $tenant
     * @return Application|Factory|View
     */
    public function edit(Tenant $tenant)
    {
        return view('', compact('tenant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Tenant $tenant
     * @return Application|Factory|View
     */
    public function update(Request $request, Tenant $tenant)
    {
        try
        {
            $path = Storage::putFileAs(env('TENANT_PHOTOS_LIB'), $request->file('photo'), $request->input('filename'));

            $tenant->fill([
                'name' => $request->input('name'),
                'address' => $request->input('address'),
                'phone' => $request->input('phone'),
                'photo' => $path,
            ])->save();

            Log::info('Tenant updated');

            session()->flash('success', 'Tenant updated successfully');

        }
        catch (Exception $e)
        {
            Log::error('Tenant not updated');

            Log::error($e);

            session()->flash('error', 'Error while updating details. Kindly try again');
        }

        return view();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Tenant $tenant
     * @return Application|Factory|View
     */
    public function destroy(Tenant $tenant)
    {
        try
        {
            $tenant->delete();

            Log::info('Tenant deleted');

            session()->flash('success', 'Tenant deleted successfully');

        }
        catch (Exception $e)
        {
            Log::error('Tenant not deleted');

            Log::error($e);

            session()->flash('error', 'Error while deleting. Kindly try again');
        }

        return view('');
    }
}

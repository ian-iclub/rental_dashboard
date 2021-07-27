<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployerStoreRequest;
use App\Models\Employer;
use App\Models\Tenant;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $employer = Employer::all();

        return view('', compact('employer'));
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
     * @param  EmployerStoreRequest  $request
     * @return Application|Factory|View
     */
    public function store(EmployerStoreRequest $request)
    {
        try
        {
            $employer = new Employer([
                'name' => $request->input('name'),
                'address' => $request->input('address'),
                'phone' => $request->input('phone'),
                'work_referee_name' => $request->input('work_referee_name'),
                'work_referee_phone' => $request->input('work_referee_phone')
            ]);

            $tenant = Tenant::find($request->input('tenant'));

            $tenant->employer()->save($employer);

            Log::info('Employer recorded');

            session()->flash('success', 'Employer recorded successfully');
        }
        catch (Exception $e)
        {
            Log::error('Employer not recorded');

            Log::error($e);

            session()->flash('error', 'Error while saving. Kindly try again');
        }

        return view();
    }

    /**
     * Display the specified resource.
     *
     * @param Employer $employer
     * @return Application|Factory|View
     */
    public function show(Employer $employer)
    {
        return view('', compact('employer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Employer $employer
     * @return Application|Factory|View
     */
    public function edit(Employer $employer)
    {
        return view('', compact('employer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Employer $employer
     * @return Application|Factory|View
     */
    public function update(Request $request, Employer $employer)
    {
        try
        {
            $employer->fill([
                'name' => $request->input('name'),
                'address' => $request->input('address'),
                'phone' => $request->input('phone'),
                'work_referee_name' => $request->input('work_referee_name'),
                'work_referee_phone' => $request->input('work_referee_phone')
            ])->save();

            Log::info('Employer record updated');

            session()->flash('success', 'Employer updated successfully');
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
     * @param Employer $employer
     * @return Application|Factory|View
     */
    public function destroy(Employer $employer)
    {
        try
        {
            $employer->delete();

            Log::info('Employer record deleted');

            session()->flash('success', 'Employer record deleted successfully');

        }
        catch (Exception $e)
        {
            Log::error('Employer record not deleted');

            Log::error($e);

            session()->flash('error', 'Error while deleting. Kindly try again');
        }

        return view('');
    }
}

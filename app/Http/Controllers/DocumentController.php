<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentStoreRequest;
use App\Models\Document;
use App\Models\Tenant;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $document = Document::all();

        return view('', compact('document'));
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
     * @param  DocumentStoreRequest  $request
     * @return Application|Factory|View
     */
    public function store(DocumentStoreRequest $request)
    {
        try
        {
            $path = Storage::putFileAs(env('TENANT_DOCUMENTS_LIB'), $request->file('file'), $request->input('filename'));

            $document = new Document([
                'type' => $request->input('type'),
                'filename' => $request->input('filename'),
                'file' => $path
            ]);

            $tenant = Tenant::find($request->input('tenant'));

            $tenant->documents()->save($document);

            Log::info('Document recorded');

            session()->flash('success', 'Document recorded successfully');
        }
        catch (Exception $e)
        {
            Log::error('Document not recorded');

            Log::error($e);

            session()->flash('error', 'Error while saving. Kindly try again');
        }

        return view();
    }

    /**
     * Display the specified resource.
     *
     * @param Document $document
     * @return Application|Factory|View
     */
    public function show(Document $document)
    {
        return view('', compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Document $document
     * @return Application|Factory|View
     */
    public function edit(Document $document)
    {
        return view('', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Document $document
     * @return Application|Factory|View
     */
    public function update(Request $request, Document $document)
    {
        try
        {
            $path = Storage::putFileAs(env('TENANT_DOCUMENTS_LIB'), $request->file('file'), $request->input('filename'));

            $document->fill([
                'type' => $request->input('type'),
                'filename' => $request->input('filename'),
                'file' => $path
            ])->save();

            Log::info('Document record updated');

            session()->flash('success', 'Document updated successfully');
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
     * @param Document $document
     * @return Application|Factory|View
     */
    public function destroy(Document $document)
    {
        try
        {
            $document->delete();

            Log::info('Document record deleted');

            session()->flash('success', 'Document record deleted successfully');

        }
        catch (Exception $e)
        {
            Log::error('Document record not deleted');

            Log::error($e);

            session()->flash('error', 'Error while deleting. Kindly try again');
        }

        return view('');
    }
}

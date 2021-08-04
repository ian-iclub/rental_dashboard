@extends('layouts.base')

@section('title', 'Tenants')

@section('pageTitle', 'Tenants')

@section('pageUrl', 'Tenants')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tenants</h4>
                    <div class="table-responsive">
                        <table id="default_order" class="table table-striped table-bordered display no-wrap"
                               style="width:100%">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Apartment</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tenants as $tenant)
                                <tr>
                                    <td class="border-top-0 px-2 py-4">
                                        <div class="d-flex no-block align-items-center">
                                            <div class="mr-3">
                                                <img src="{{ asset($tenant->photo) }}" alt="user" class="rounded-circle" width="45" height="45" />
                                            </div>
                                            <div class="">
                                                <h5 class="text-dark mb-0 font-16 font-weight-medium">
                                                    {{$tenant->name}}
                                                </h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $tenant->address }}</td>
                                    <td>{{ $tenant->phone }}</td>
                                    <td>{{ $tenant->apartment->number }}</td>
                                    <td>
                                        <form action="{{route('admin.tenants.show', $tenant->id)}}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger mr-2 mb-2">
                                                View More
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


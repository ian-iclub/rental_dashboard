@extends('layouts.base')

@section('title', 'Apartments')

@section('pageTitle', 'Apartments')

@section('pageUrl', 'Apartments')

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
                                <th>Apartment Number</th>
                                <th>Type</th>
                                <th>Floor</th>
                                <th>Meter Number</th>
                                <th>Rent</th>
                                <th>Tenant</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($apartments as $apartment)
                                <tr>
                                    <td>{{$apartment->name}}</td>
                                    <td>{{ $apartment->type }}</td>
                                    <td>{{ $apartment->floor }}</td>\
                                    <td>{{ $apartment->meter_number }}</td>
                                    <td>{{ $apartment->rent }}</td>
                                    <td>{{ $apartment->tenannt->name }}</td>
                                    <td>
                                        @if($apartment->status)
                                            <span class="badge badge-pill badge-success">Occupied</span>
                                        @else
                                            <span class="badge badge-pill badge-danger">Empty</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{route('admin.apartments.edit', $apartment->id)}}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger mr-2 mb-2">
                                                <i class="fa fa-edit" title="Edit details"></i>
                                            </button>
                                        </form>
                                        <form action="{{route('admin.apartments.show', $apartment->id)}}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger mr-2 mb-2">
                                                <i class="fa fa-arrow-right" title="Show more"></i>
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


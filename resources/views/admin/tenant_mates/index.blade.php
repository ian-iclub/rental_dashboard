@extends('layouts.base')

@section('title', 'Tenants Mates: All')

@section('pageTitle', 'All Tenants Mates')

@section('pageUrl', 'People')

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
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Tenant staying with</th>
                                <th>Apartment</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tenant_mates as $tenant_mate)
                                <tr>
                                    <td>{{$tenant_mate->name}}</td>
                                    <td>{{ $tenant_mate->phone }}</td>
                                    <td>{{ $tenant_mate->tenant->name }}</td>
                                    <td>{{ $tenant_mate->tenant->apartment->number }}</td>
                                    <td>
                                        <form action="{{route('admin.tenant_mates.edit', $tenant_mate->id)}}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger mr-2 mb-2">
                                                <i class="fa fa-edit" title="Edit details"></i>
                                            </button>
                                        </form>
                                        <form action="{{route('admin.tenant_mates.show', $tenant_mate->id)}}" method="post">
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


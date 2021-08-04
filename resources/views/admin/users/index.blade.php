@extends('layouts.base')

@section('title', 'Users')

@section('pageTitle', 'Users')

@section('pageUrl', 'Users')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">User Accounts</h4>
                    <div class="table-responsive">
                        <table id="default_order" class="table table-striped table-bordered display no-wrap"
                               style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Verify</th>
                                    <th>Delete Account</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if($user->email_verified_at == null)
                                            <form action="{{ route('admin.verifyUser', $user->id) }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Verify</button>
                                            </form>
                                        @else
                                            <span class="badge badge-pill badge-success"> Account Verified </span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{route('admin.deleteUser', $user->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger mr-2 mb-2" onclick="return confirm('Are you sure you want to delete this account? This action cannot be undone');">
                                                <i class="fa fa-trash"></i>
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


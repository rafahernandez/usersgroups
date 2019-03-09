@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card" style="width: 18rem;">
                                <div class="card-header">
                                    Users
                                </div>
                                <ul class="list-group list-group-flush">
                                    @foreach ($users as $user)
                                    <li class="list-group-item">
                                        <a href="/user/{{ $user->id }}">{{ $user->id }}. {{ $user->name }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card" style="width: 18rem;">
                                <div class="card-header">
                                    Groups
                                </div>
                                <ul class="list-group list-group-flush">
                                    @foreach ($groups as $group)
                                    <li class="list-group-item">
                                        <a href="/group/{{ $group->id }}">{{ $group->id }}. {{ $group->name }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

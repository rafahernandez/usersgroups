@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User detail for {{ $user->name}} (ID: {{ $user->id}})</div>

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
                                    Users' memberships
                                </div>
                                <ul class="list-group list-group-flush">
                                    @forelse ($user->groups as $group)
                                    <li class="list-group-item">{{ $group->id }}. {{ $group->name }}</li>
                                    @empty
                                    <li class="list-group-item">No active memberships</li>
                                    @endforelse
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
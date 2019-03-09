@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Group detail for {{ $group->name}} (ID: {{ $group->id}})</div>

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
                                    Users in this group
                                </div>
                                <ul class="list-group list-group-flush">
                                    @forelse ($group->users as $user)
                                    <li class="list-group-item">{{ $user->id }}. {{ $user->name }}</li>
                                    @empty
                                    <li class="list-group-item">No users in group</li>
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
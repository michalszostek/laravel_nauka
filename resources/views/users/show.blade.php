@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    {{ $user->name }}
                    @if($user->sex === 'm')
                        male
                    @elseif($user->sex === 'f')
                        female
                    @endif
                    {{ $user->email }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

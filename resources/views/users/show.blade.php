@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            {{-- @include('layouts.sidebar') --}}

            <img src="{{url('user_avatar/' . $user->id . '/200')}}" alt="user photo">
            @if($user->id == Auth::id())
                <a href="{{url('/users/' . $user->id . '/edit')}}">edit</a>
            @endif


            <div class="col-md-8">
                @if($user->id === Auth::id())
                    <div class="row">
                        <div class="col-md-12">
                            {{-- @include('posts.create') --}}
                        </div>
                    </div>
                @endif

                {{-- @foreach ($posts as $post)
                    @include('posts.show')
                @endforeach --}}
            </div>
        </div>
    </div>
@endsection
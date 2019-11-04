@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        search results:
                    </div>
                    <div class="card-body text-center">
                        @if($results->count() === 0)
                            <div class="alert alert-secondary" role="alert">
                                <h4 class="alert-heading">no results found</h4>
                                <hr>
                                <p>Try different keywords</p>
                            </div>
                        @else
                            <div class="row">
                                @foreach ($results as $user)
                                    <div class="col-md-4 text-center">
                                        <img src="{{$user->avatar}}" alt="user photo">
                                        <a href="{{ url('/users/' . $user->id) }}">
                                            <div>
                                                <div class="card-body table-bordered mb-4">
                                                    <div class="card-footer bg-transparent">
                                                        <h6>{{ $user->name }}</h6>
                                                        <p>trener</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    {{ $results }}
                                </ul>
                            </nav>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<div class="col-md-4 ">
    <div class="card">
        <div class="card-header">
            Użytkownik
        </div>
        <div class="card-body text-center">

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <img class="rounded-left mx-auto d-block" src="{{ url( 'user_avatar/' . $user->id . '/200' ) }}"
                 alt="avatar">

            <div class="card-body">
                <h2 class=""><a href="{{url('/users/' . $user->id)}}">{{$user->name}}</a></h2>

                <p> @if($user->sex === 'm') male @else female @endif </p>

                <p> {{$user->email}} </p>

                @if($user->id === Auth::id())
                    <a href="{{url('/users/' . $user->id . '/edit')}}" class="btn btn-block btn-outline-primary">edit
                        profile</a>
                @endif

                {{--                <a href="{{url('/users/' . $user->id . '/friends')}}" class="btn btn-block btn-outline-primary mb-2">friends <span class="badge badge-primary">{{ $user->friends()->count() }}</span></a>--}}

                <form action="{{ url('/friends/' . $user->id) }}" method="post">
                    {{ csrf_field() }}
                    @if (Auth::check() && $user->id !== Auth::id())
                        @if ( ! friendship($user->id)->exists && ! has_friend_invitation($user->id))
                            <button class="btn btn-block btn-outline-primary" type="submit">add to friends</button>
                        @elseif (has_friend_invitation($user->id))
                            {{ method_field('PATCH') }}
                            <button class="btn btn-block btn-outline-success" type="submit">confirm invitation</button>
                        @elseif (friendship($user->id)->exists && ! friendship($user->id)->accepted)
                            <button class="btn btn-block btn-outline-success" type="submit" disabled>invitation sent
                            </button>
                        @elseif (friendship($user->id)->exists && friendship($user->id)->accepted)
                            {{ method_field('DELETE') }}
                            <button class="btn btn-block btn-outline-danger" type="submit">remove from friends</button>
                        @endif
                    @endif
                </form>

            </div>
        </div>
    </div>
</div>
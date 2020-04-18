<header class="panel-head container-fluid py-3">
    <h1>Správy</h1>
    <div class="chat">
    </div>
</header>


    <div class="row container-fluid">
        {{--@foreach($users as $user)--}}

        {{--@endforeach--}}

        {{--Main Content--}}

        <div class="container-fluid py-4 px-4 my-4 shadow  bg-white rounded text-left d-inline-block w-100">
            <div class="row">
                <div class="col-md-4">
                    <div class="user-wrapper">
                        <ul class="users">
                            @foreach($users as $user)
                            <li class="user" id="{{ $user->id }}">
                                @if($user->unread)
                                    <span class="pending">{{ $user->unread }}</span>
                                @endif
                                <div class="media">
                                    <div class="media-left">
                                        <img class="media-object" src="{{ ($user->avatar==null) ? url("../public/img/defaultAvatar.png") : url("../public/uploads/users/avatars/".$user->avatar) }}" alt="Profile Picture">
                                    </div>
                                    <div class="media-body">
                                        <p class="name">{{ $user->name }}</p>
                                        <p class="email">{{ $user->email }}</p>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-8" id="messages">

                </div>
            </div>
        </div>
    </div>


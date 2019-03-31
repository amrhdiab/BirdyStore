<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                       aria-expanded="false">
                        <img src="{{asset('/storage/users').'/'.Auth::guard('admin')->user()->avatar}}"
                             alt="">{{Auth::guard('admin')->user()->name}}
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li>
                            <a href="{{ route('admin.logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out pull-right"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>

                <li role="presentation" class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                       aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green">{{$messagesCount}}</span>
                    </a>
                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                        @foreach($messages as $message)
                            <li>
                                <a href="{{route('messages.single',$message->id)}}">
                                    <span class="image"><i class="fa fa-envelope"></i></span>
                                    <span>
                                          <span>{{$message->name}}</span>
                                          <span class="time">{{$message->created_at->diffForHumans()}}</span>
                                    </span>
                                    <span class="message">
                                        {{substr($message->body,0,50)}}...
                                    </span>
                                </a>
                            </li>
                        @endforeach
                        <li>
                            <div class="text-center">
                                <a href="{{route('messages.index')}}">
                                    <strong>See All Messages</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
<div class="top_nav">
  <div class="nav_menu">
    <nav>
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{asset('assets/build/images/userlogo.png')}}" alt="">{{{ Auth::user()->name}}}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                  </ul>
                </li>

        {{-- Alert drop down --}}
        <li role="presentation" class="dropdown">

          <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-bell-o"></i>
            @if(\Auth::user()->unreadNotifications()->exists())
              <span class="badge bg-green">{{ \Auth::user()->unreadNotifications->count() }}</span>
            @endif
          </a>

          <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">


            @if(\Auth::user()->unreadNotifications()->exists())
              @foreach(\Auth::user()->unreadNotifications as $row)
                <li>
                  <a href="{{ route('notification.show', ['notification'=>$row->id]) }}">
                    <span class="image">{!! fa('fa-bell fa-2x fa-border') !!}</span>
                    <span>
                      <span>Sender: {{ \App\User::find($row->data['sender_id'])->name }}</span>
                      <span class="time">{{ \Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</span>
                    </span>
                    <span class="message">
                      <strong>{{ $row->data['subject'] }}:</strong> {{ $row->data['message'] }}
                    </span>
                  </a>
                </li>
              @endforeach

              <li>
                <div class="text-center">
                  <a href="{{ route('notification.index') }}">
                    <strong>See All Notifications</strong>
                    <i class="fa fa-angle-right"></i>
                  </a>
                </div>
              </li>

            @else

              <li>
                <div class="text-center">
                  <a>
                    <strong>Does't have any unread notification.</strong>
                  </a>
                </div>
              </li>

            @endif
          </ul>

        </li>
        {{-- End of aalert dropdown --}}

      </ul>
    </nav>
  </div>
</div>

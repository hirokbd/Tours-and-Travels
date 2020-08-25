<!-- partial:partials/_navbar.html -->
<nav class="navbar navbar-light col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
 <!--   <div class="text-center navbar-brand-wrapper">
        <a class="navbar-brand brand-logo" href="#"><img src="#" alt="Logo"></a>
    </div>-->
    <div class="text-center navbar-brand-wrapper">
        <a href="{{ url('/dashboard') }}"><img src="{{ asset('assets/images/banner.png')}}" width="100%" height="65px" alt="Logo"></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler align-self-center mr-2" type="button" data-toggle="minimize">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="btn-group d-none d-sm-block">
            <button type="button" class="btn btn-secondary btn-sm text-muted border-0 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Separated link</a>
            </div>
        </div>
        <form class="form-inline mt-2 ml-3 mt-md-0 d-none d-sm-block">
            <div class="input-group solid">
                <span class="input-group-addon"><i class="mdi mdi-magnify"></i></span>
                <input type="text" class="form-control">
            </div>
        </form>
        <ul class="navbar-nav ml-lg-auto">
            <li class="nav-item dropdown">
                <a class="nav-link count-indicator" id="notificationDropdown" href="#" data-toggle="dropdown">
                    <i class="mdi mdi-bell-outline"></i>
                    <span class="count bg-warning">7</span>
                </a>
                <div class="dropdown-menu navbar-dropdown notification-drop-down" aria-labelledby="notificationDropdown">
                    <a class="dropdown-item" href="#">
                        <i class="fa fa-birthday-cake text-success fa-fw"></i>
                        <span class="notification-text">Today is John's birthday</span>
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fa fa-phone text-danger fa-fw"></i>
                        <span class="notification-text">Call John Doe</span>
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fa fa-handshake-o text-primary fa-fw"></i>
                        <span class="notification-text">Meeting Alisa</span>
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fa fa-exclamation-triangle text-danger fa-fw"></i>
                        <span class="notification-text">Server space almost full</span>
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fa fa-bell text-warning fa-fw"></i>
                        <span class="notification-text">Payment Due</span>
                    </a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link count-indicator" id="MailDropdown" href="#" data-toggle="dropdown">
                    <i class="mdi mdi-message-outline"></i>
                    <span class="count bg-danger">4</span>
                </a>
                <div class="dropdown-menu navbar-dropdown mail-notification" aria-labelledby="MailDropdown">
                    <a class="dropdown-item" href="#">
                        <div class="sender-img">
                            <img src="http://via.placeholder.com/47x47" alt="">
                            <span class="badge badge-success">&nbsp;</span>
                        </div>
                        <div class="sender">
                            <p class="Sende-name">John Doe</p>
                            <p class="Sender-message">Hey, We have a meeting planned at the end of the day.</p>
                        </div>
                    </a>
                    <a class="dropdown-item" href="#">
                        <div class="sender-img">
                            <img src="http://via.placeholder.com/47x47" alt="">
                            <span class="badge badge-success">&nbsp;</span>
                        </div>
                        <div class="sender">
                            <p class="Sende-name">Leanne Jones</p>
                            <p class="Sender-message">Can we schedule a call this afternoon?</p>
                        </div>
                    </a>
                    <a class="dropdown-item" href="#">
                        <div class="sender-img">
                            <img src="http://via.placeholder.com/47x47" alt="">
                            <span class="badge badge-primary">&nbsp;</span>
                        </div>
                        <div class="sender">
                            <p class="Sende-name">Stella</p>
                            <p class="Sender-message">Great presentation the other day. Keep up the good work!</p>
                        </div>
                    </a>
                    <a class="dropdown-item" href="#">
                        <div class="sender-img">
                            <img src="http://via.placeholder.com/47x47" alt="">
                            <span class="badge badge-warning">&nbsp;</span>
                        </div>
                        <div class="sender">
                            <p class="Sende-name">James Brown</p>
                            <p class="Sender-message">Need the updates of the project at the end of the week.</p>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item view-all">View all</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link count-indicator" id="MailDropdown" href="#" data-toggle="dropdown">
                    <i class="mdi mdi-account-outline"></i>
                </a>
                <div class="dropdown-menu navbar-dropdown mail-notification" aria-labelledby="MailDropdown">
             <!--       <a class="dropdown-item" href="#">
                        <div class="sender-img">
                            <img src="{{ asset('assets/images/user/hirok.jpg')}}" alt="User Profile Picture" width="47">
                            <span class="badge badge-success">&nbsp;</span>
                        </div>
                        <div class="sender">
                            <p class="Sende-name">{{ Auth::user()->name }} - Manager</p>
                            <p class="Sender-message">Member since Nov. 2012</p>
                        </div>
                    </a>-->
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item view-all">{{ __('Singout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
 <!--   <div class="user-info">
        <div class="profile">
            <img src="{{ asset('assets/images/user/ritesh.jpg')}}" alt="User Profile Picture" width="47">
        </div>
        <div class="details">
            <p class="user-name">{{ Auth::user()->name }}</p>
            <p class="designation">Manager</p>
        </div>
    </div>-->
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/dashboard') }}">
                <i class="mdi mdi-gauge menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#bookingSubmenu" aria-expanded="false" aria-controls="bookingSubmenu">
                <i class="mdi mdi-clipboard-text menu-icon"></i>
                <span class="menu-title">Invoice</span>
                <i class="mdi mdi-chevron-down menu-arrow"></i>
            </a>
            <div class="collapse" id="bookingSubmenu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/invoice') }}">All Invoice</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/invoice/add') }}">Add Invoice</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('/package') }}">
                <i class="mdi mdi-package-variant menu-icon"></i>
                <span class="menu-title">Package</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#agentSubmenu" aria-expanded="false" aria-controls="agentSubmenu">
                <i class="mdi mdi-account-multiple-outline menu-icon"></i>
                <span class="menu-title">Agent</span>
                <i class="mdi mdi-chevron-down menu-arrow"></i>
            </a>
            <div class="collapse" id="agentSubmenu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/agent') }}">All Agent</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/agent/add') }}">Add Agent</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/location') }}">Location</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#clientSubmenu" aria-expanded="false" aria-controls="clientSubmenu">
                <i class="mdi mdi-account-outline menu-icon"></i>
                <span class="menu-title">Passenger</span>
                <i class="mdi mdi-chevron-down menu-arrow"></i>
            </a>
            <div class="collapse" id="clientSubmenu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/passenger') }}">All Passenger</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/passenger/add') }}">Add Passenger</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#visaSubmenu" aria-expanded="false" aria-controls="visaSubmenu">
                <i class="mdi mdi-web menu-icon"></i>
                <span class="menu-title">Visa Application</span>
                <i class="mdi mdi-chevron-down menu-arrow"></i>
            </a>
            <div class="collapse" id="visaSubmenu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/visa') }}">All Visa Application</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/visa/add') }}">Add Visa Application</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#officeSubmenu" aria-expanded="false" aria-controls="officeSubmenu">
                <i class="mdi mdi mdi-earth menu-icon"></i>
                <span class="menu-title">Foreign Office</span>
                <i class="mdi mdi-chevron-down menu-arrow"></i>
            </a>
            <div class="collapse" id="officeSubmenu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/office') }}">All Foreign Office</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/office/add') }}">Add Foreign Office</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/office/remittance') }}">Foreign Remittance</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#bankSubmenu" aria-expanded="false" aria-controls="bankSubmenu">
                <i class="mdi mdi-bank menu-icon"></i>
                <span class="menu-title">Bank</span>
                <i class="mdi mdi-chevron-down menu-arrow"></i>
            </a>
            <div class="collapse" id="bankSubmenu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/bank') }}">All Bank</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/bank/add') }}">Add Bank</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#accountsSubmenu" aria-expanded="false" aria-controls="accountsSubmenu">
                <i class="mdi mdi-cash-usd menu-icon"></i>
                <span class="menu-title">Accounts</span>
                <i class="mdi mdi-chevron-down menu-arrow"></i>
            </a>
            <div class="collapse" id="accountsSubmenu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/accounts') }}">Income Statement</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/accounts/expense/add') }}">Add Expense</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{ url('/accounts/expense') }}">All Expense</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#settingSubmenu" aria-expanded="false" aria-controls="settingSubmenu">
                <i class="mdi mdi-settings menu-icon"></i>
                <span class="menu-title">Settings</span>
                <i class="mdi mdi-chevron-down menu-arrow"></i>
            </a>
            <div class="collapse" id="settingSubmenu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/settings') }}">Company Settings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/settings/currency-type') }}">Payment Type</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/settings/visa-type') }}">Visa Type</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/settings/country') }}">Country</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/settings/exname') }}">Expense</a>
                    </li>
                </ul>
            </div>
        </li>

    </ul>
</nav>
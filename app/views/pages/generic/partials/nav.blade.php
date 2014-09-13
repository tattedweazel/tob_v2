<div class="navbar-wrapper">
    <div class="container">
        <div class="navbar navbar-inverse navbar-static-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    {{ link_to_route('home', $site_name, null, ['class' => 'navbar-brand']) }}
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li {{ ($section_title == 'Home') ? 'class="active"':'' }}>{{ link_to_route('home', 'Home') }}</li>
                        <li {{ ($section_title == 'About') ? 'class="active"':'' }}><a href="#about">About</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                @if ($current_user)
                                <li>{{ link_to_route('update_account_path', 'My Settings') }}</li>
                                <li>{{ link_to_route('logout_path', 'Sign Out') }}</li>
                                @else
                                <li>{{ link_to_route('register_path', 'Sign Up') }}</li>
                                <li>{{ link_to_route('login_path', 'Sign In') }}</li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>
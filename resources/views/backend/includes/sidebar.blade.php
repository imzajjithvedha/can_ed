<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">
                @lang('menus.backend.sidebar.general')
            </li>
            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Route::is('admin/dashboard'))
                }}" href="{{ route('admin.dashboard') }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    @lang('menus.backend.sidebar.dashboard')
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Route::is('admin/articles.index'))
                }}" href="{{ route('admin.articles.index') }}">
                    <i class="nav-icon far fa-newspaper"></i>
                    Articles
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Route::is('admin/businesses.index'))
                }}" href="{{ route('admin.businesses.index') }}">
                    <i class="nav-icon fas fa-briefcase"></i>
                    Businesses
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Route::is('admin/categories.index'))
                }}" href="{{ route('admin.categories.index') }}">
                    <i class="nav-icon fas fa-suitcase"></i>
                    Business Categories
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Route::is('admin/directory.index'))
                }}" href="{{ route('admin.directory.index') }}">
                    <i class="nav-icon fas fa-folder"></i>
                    Business Directory
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Route::is('admin/dashboard'))
                }}" href="{{ route('admin.dashboard') }}">
                    <i class="nav-icon fas fa-tasks"></i>
                    Careers
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Route::is('admin/dashboard'))
                }}" href="{{ route('admin.dashboard') }}">
                    <i class="nav-icon far fa-address-card"></i>
                    Contact Us
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Route::is('admin/events.index'))
                }}" href="{{ route('admin.events.index') }}">
                    <i class="nav-icon far fa-calendar-alt"></i>
                    Events
                </a>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon fas fa-file"></i>
                    Pages
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/pages.about_us'))}}" href="{{ route('admin.pages.about_us') }}">
                            About Us
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/pages.disclaimer'))}}" href="{{ route('admin.pages.disclaimer') }}">
                            Disclaimer
                        </a>
                    </li>                

                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/pages.faq'))}}" href="{{ route('admin.pages.faq') }}">
                            FAQ
                        </a>
                    </li>

                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            Our Team
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link {{active_class(Route::is('admin/pages.meet_our_team'))}}" href="{{ route('admin.pages.meet_our_team') }}">
                                    Meet our Team
                                </a>
                            </li>
                           
                            <li class="nav-item">
                                <a class="nav-link {{active_class(Route::is('admin/team.index'))}}" href="{{ route('admin.team.index') }}">Team Members</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            Our Sponsors
                        </a>

                        <ul class="nav-dropdown-items">
                            <li>
                                <a class="nav-link {{active_class(Route::is('admin/pages.our_sponsors'))}}" href="{{ route('admin.pages.our_sponsors') }}">
                                    Our Sponsors Details
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{active_class(Route::is('admin/sponsors.index'))}}" href="{{ route('admin.sponsors.index') }}">Sponsors</a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/pages.privacy_policy'))}}" href="{{ route('admin.pages.privacy_policy') }}">
                            Privacy Policy
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Route::is('admin/programs.index'))
                }}" href="{{ route('admin.programs.index') }}">
                    <i class="nav-icon fas fa-project-diagram"></i>
                    Programs
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Route::is('admin/quotes.index'))
                }}" href="{{ route('admin.quotes.index') }}">
                    <i class="nav-icon fas fa-quote-right"></i>
                    Quotes
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Route::is('admin/dashboard'))
                }}" href="{{ route('admin.schools.index') }}">
                    <i class="nav-icon fas fa-school"></i>
                    Schools
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Route::is('admin/dashboard'))
                }}" href="{{ route('admin.dashboard') }}">
                    <i class="nav-icon fab fa-weebly"></i>
                    Website Details
                </a>
            </li>

            
            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Route::is('admin/networks.index'))
                }}" href="{{ route('admin.networks.index') }}">
                    <i class="nav-icon fas fa-network-wired"></i>
                    World Wide Network
                </a>
            </li>

            

        

            @if ($logged_in_user->isAdmin())
                <li class="nav-title">
                    @lang('menus.backend.sidebar.system')
                </li>

                <li class="nav-item nav-dropdown {{
                    active_class(Route::is('admin/auth*'), 'open')
                }}">
                    <a class="nav-link nav-dropdown-toggle {{
                        active_class(Route::is('admin/auth*'))
                    }}" href="#">
                        <i class="nav-icon far fa-user"></i>
                        @lang('menus.backend.access.title')

                        @if ($pending_approval > 0)
                            <span class="badge badge-danger">{{ $pending_approval }}</span>
                        @endif
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link {{
                                active_class(Route::is('admin/auth/user*'))
                            }}" href="{{ route('admin.auth.user.index') }}">
                                @lang('labels.backend.access.users.management')

                                @if ($pending_approval > 0)
                                    <span class="badge badge-danger">{{ $pending_approval }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{
                                active_class(Route::is('admin/auth/role*'))
                            }}" href="{{ route('admin.auth.role.index') }}">
                                @lang('labels.backend.access.roles.management')
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="divider"></li>

                <li class="nav-item nav-dropdown {{
                    active_class(Route::is('admin/log-viewer*'), 'open')
                }}">
                        <a class="nav-link nav-dropdown-toggle {{
                            active_class(Route::is('admin/log-viewer*'))
                        }}" href="#">
                        <i class="nav-icon fas fa-list"></i> @lang('menus.backend.log-viewer.main')
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link {{
                            active_class(Route::is('admin/log-viewer'))
                        }}" href="{{ route('log-viewer::dashboard') }}">
                                @lang('menus.backend.log-viewer.dashboard')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{
                            active_class(Route::is('admin/log-viewer/logs*'))
                        }}" href="{{ route('log-viewer::logs.list') }}">
                                @lang('menus.backend.log-viewer.logs')
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </nav>

    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div><!--sidebar-->

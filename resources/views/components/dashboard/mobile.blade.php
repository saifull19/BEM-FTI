<aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 overflow-y-auto bg-white md:hidden" x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu" @keydown.escape="closeSideMenu" aria-label="aside">
    <div class=" text-gray-500 dark:text-gray-400">

        <a class="ml-6" href="{{ route('index') }}">
            <img style="width: 100px; height: 100px; margin-left: 80px;" src="{{ asset('/assets/images/logo.png') }}" alt="" class="ml-6">
        </a>

        <div class="flex items-center pt-5 pl-5 mt-10 space-x-2 border-t border-gray-100">
            <!--Author's profile photo-->
            
                        @if (auth()->user()->detail_user()->first()->photo != NULL)

                            <img src="{{ url(Storage::url(auth()->user()->detail_user()->first()->photo)) }}" alt="Photo Profile" class="rounded-full w-16 h-16">

                        @else    
                                        
                            <img class="inline mr-3 h-12 w-12 rounded-full" src="{{ url('https://randomuser.me/api/portraits/men/1.jpg') }}" alt="">

                        @endif

            <div>
                <!--Author name-->
                <p class="font-semibold text-gray-900 text-md">{{ Auth::user()->name ?? '' }}</p>
                <p class="text-sm font-light text-serv-text">
                    {{ auth()->user()->detail_user()->first()->role ?? '' }}
                </p>
            </div>

        </div>

        @can('admin')
            <ul class="mt-6">
                <li class="relative px-6 py-3">

                    {{-- membuat kondisi aktif pada menu yang sedang dipilih --}}
                    @if (
                        request()->is('admin/dashboard') ||
                        request()->is('admin/dashboard/*') ||
                        request()->is('admin/*/dashboard') ||
                        request()->is('admin/*/dashboard/*') 
                    )
                        
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-serv-bg" aria-hidden="true"></span>
                        
                    @endif

                    <a class="inline-flex items-center w-full text-sm font-medium text-gray-800 transition-colors duration-150 hover:text-gray-800" href="{{ route('admin.dashboard.index') }}">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.5 16V9.02123C19.5 7.75027 18.896 6.55494 17.8728 5.80101L12.3728 1.74838C10.9618 0.708674 9.03823 0.708675 7.6272 1.74838L2.1272 5.80101C1.10401 6.55494 0.5 7.75027 0.5 9.02123V16C0.5 18.2091 2.29086 20 4.5 20H5.75C6.57843 20 7.25 19.3284 7.25 18.5V16C7.25 15.1716 7.92157 14.5 8.75 14.5H11.25C12.0784 14.5 12.75 15.1716 12.75 16V18.5C12.75 19.3284 13.4216 20 14.25 20H15.5C17.7091 20 19.5 18.2091 19.5 16Z" fill="#082431" />
                        </svg>
                        <span class="ml-4">Dashboard</span>
                    </a>

                </li>
            </ul>

            <ul>
                <li class="relative px-6 py-3">

                    {{-- membuat kondisi aktif pada menu yang sedang dipilih --}}
                    @if (
                        request()->is('admin/servic') ||
                        request()->is('admin/servic/*') ||
                        request()->is('admin/*/servic') ||
                        request()->is('admin/*/servic/*') 
                    )
                        
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-serv-bg" aria-hidden="true"></span>
                        
                    @endif

                    <a class="inline-flex items-center w-full text-sm font-light transition-colors duration-150 hover:text-gray-800" href="{{ route('admin.servic.index') }}">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="3" y="3" width="7" height="7" rx="2" stroke="#082431" stroke-width="1.5" />
                            <rect x="3" y="14" width="7" height="7" rx="2" stroke="#082431" stroke-width="1.5" />
                            <rect x="14" y="3" width="7" height="7" rx="2" stroke="#082431" stroke-width="1.5" />
                            <rect x="14" y="14" width="7" height="7" rx="2" stroke="#082431" stroke-width="1.5" />
                        </svg>
                        <span class="ml-4">My Services</span>
                        <span class="inline-flex items-center justify-center px-3 py-2 ml-auto text-xs font-bold leading-none text-green-500 rounded-full bg-serv-green-badge">.</span>

                    </a>
                </li>

                <li class="relative px-6 py-3">

                    {{-- membuat kondisi aktif pada menu yang sedang dipilih --}}
                    @if (
                        request()->is('admin/order') ||
                        request()->is('admin/order/*') ||
                        request()->is('admin/*/order') ||
                        request()->is('admin/*/order/*') 
                    )
                        
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-serv-bg" aria-hidden="true"></span>
                        
                    @endif

                    <a class="inline-flex items-center w-full text-sm font-light transition-colors duration-150 hover:text-gray-800" href="{{ route('admin.order.index') }}">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="3.25" y="2.25" width="17.5" height="19.5" rx="4.75" stroke="#082431" stroke-width="1.5" />
                            <line x1="7.75" y1="7.25" x2="10.25" y2="7.25" stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                            <line x1="7.75" y1="11.25" x2="16.25" y2="11.25" stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                            <line x1="7.75" y1="15.25" x2="16.25" y2="15.25" stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                        <span class="ml-4">My Orders</span>
                        <span class="inline-flex items-center justify-center px-3 py-2 ml-auto text-xs font-bold leading-none text-green-500 rounded-full bg-serv-green-badge">.</span>
                    </a>
                </li>

                <li class="relative px-6 py-3">

                    {{-- membuat kondisi aktif pada menu yang sedang dipilih --}}
                    @if (
                        request()->is('admin/webinar') ||
                        request()->is('admin/webinar/*') ||
                        request()->is('admin/*/webinar') ||
                        request()->is('admin/*/webinar/*') 
                    )
                        
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-serv-bg" aria-hidden="true"></span>
                        
                    @endif

                    <a class="inline-flex items-center w-full text-sm font-light transition-colors duration-150 hover:text-gray-800" href="{{ route('admin.webinar.index') }}">
                            <svg width="28" height="28" class="svg-icon" viewBox="0 0 20 20">
                                <path d="M17.237,3.056H2.93c-0.694,0-1.263,0.568-1.263,1.263v8.837c0,0.694,0.568,1.263,1.263,1.263h4.629v0.879c-0.015,0.086-0.183,0.306-0.273,0.423c-0.223,0.293-0.455,0.592-0.293,0.92c0.07,0.139,0.226,0.303,0.577,0.303h4.819c0.208,0,0.696,0,0.862-0.379c0.162-0.37-0.124-0.682-0.374-0.955c-0.089-0.097-0.231-0.252-0.268-0.328v-0.862h4.629c0.694,0,1.263-0.568,1.263-1.263V4.319C18.5,3.625,17.932,3.056,17.237,3.056 M8.053,16.102C8.232,15.862,8.4,15.597,8.4,15.309v-0.89h3.366v0.89c0,0.303,0.211,0.562,0.419,0.793H8.053z M17.658,13.156c0,0.228-0.193,0.421-0.421,0.421H2.93c-0.228,0-0.421-0.193-0.421-0.421v-1.263h15.149V13.156z M17.658,11.052H2.509V4.319c0-0.228,0.193-0.421,0.421-0.421h14.308c0.228,0,0.421,0.193,0.421,0.421V11.052z"></path>
                            </svg>
                        <span class="ml-4">Webinar</span>
                    </a>
                </li>

                <li class="relative px-6 py-3">

                    {{-- membuat kondisi aktif pada menu yang sedang dipilih --}}
                    @if (
                        request()->is('admin/mentor') ||
                        request()->is('admin/mentor/*') ||
                        request()->is('admin/*/mentor') ||
                        request()->is('admin/*/mentor/*') 
                    )
                        
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-serv-bg" aria-hidden="true"></span>
                        
                    @endif

                    <a class="inline-flex items-center w-full text-sm font-light transition-colors duration-150 hover:text-gray-800" href="{{ route('admin.mentor.index') }}">
                        <svg  width="28" height="28" class="svg-icon" viewBox="0 0 20 20">
                                <path d="M15.573,11.624c0.568-0.478,0.947-1.219,0.947-2.019c0-1.37-1.108-2.569-2.371-2.569s-2.371,1.2-2.371,2.569c0,0.8,0.379,1.542,0.946,2.019c-0.253,0.089-0.496,0.2-0.728,0.332c-0.743-0.898-1.745-1.573-2.891-1.911c0.877-0.61,1.486-1.666,1.486-2.812c0-1.79-1.479-3.359-3.162-3.359S4.269,5.443,4.269,7.233c0,1.146,0.608,2.202,1.486,2.812c-2.454,0.725-4.252,2.998-4.252,5.685c0,0.218,0.178,0.396,0.395,0.396h16.203c0.218,0,0.396-0.178,0.396-0.396C18.497,13.831,17.273,12.216,15.573,11.624 M12.568,9.605c0-0.822,0.689-1.779,1.581-1.779s1.58,0.957,1.58,1.779s-0.688,1.779-1.58,1.779S12.568,10.427,12.568,9.605 M5.06,7.233c0-1.213,1.014-2.569,2.371-2.569c1.358,0,2.371,1.355,2.371,2.569S8.789,9.802,7.431,9.802C6.073,9.802,5.06,8.447,5.06,7.233 M2.309,15.335c0.202-2.649,2.423-4.742,5.122-4.742s4.921,2.093,5.122,4.742H2.309z M13.346,15.335c-0.067-0.997-0.382-1.928-0.882-2.732c0.502-0.271,1.075-0.429,1.686-0.429c1.828,0,3.338,1.385,3.535,3.161H13.346z"></path>
                            </svg>
                        <span class="ml-4">Mentor Management</span>
                    </a>
                </li>

                <li class="relative px-6 py-3">

                    {{-- membuat kondisi aktif pada menu yang sedang dipilih --}}
                    @if (
                        request()->is('admin/role') ||
                        request()->is('admin/role/*') ||
                        request()->is('admin/*/role') ||
                        request()->is('admin/*/role/*') 
                    )
                        
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-serv-bg" aria-hidden="true"></span>
                        
                    @endif

                    <a class="inline-flex items-center w-full text-sm font-light transition-colors duration-150 hover:text-gray-800" href="{{ route('admin.role.index') }}">
                        <svg  width="28" height="28" class="svg-icon" viewBox="0 0 20 20">
                                <path d="M10,1.529c-4.679,0-8.471,3.792-8.471,8.471c0,4.68,3.792,8.471,8.471,8.471c4.68,0,8.471-3.791,8.471-8.471C18.471,5.321,14.68,1.529,10,1.529 M10,17.579c-4.18,0-7.579-3.399-7.579-7.579S5.82,2.421,10,2.421S17.579,5.82,17.579,10S14.18,17.579,10,17.579 M14.348,10c0,0.245-0.201,0.446-0.446,0.446h-5c-0.246,0-0.446-0.201-0.446-0.446s0.2-0.446,0.446-0.446h5C14.146,9.554,14.348,9.755,14.348,10 M14.348,12.675c0,0.245-0.201,0.446-0.446,0.446h-5c-0.246,0-0.446-0.201-0.446-0.446s0.2-0.445,0.446-0.445h5C14.146,12.229,14.348,12.43,14.348,12.675 M7.394,10c0,0.245-0.2,0.446-0.446,0.446H6.099c-0.245,0-0.446-0.201-0.446-0.446s0.201-0.446,0.446-0.446h0.849C7.194,9.554,7.394,9.755,7.394,10 M7.394,12.675c0,0.245-0.2,0.446-0.446,0.446H6.099c-0.245,0-0.446-0.201-0.446-0.446s0.201-0.445,0.446-0.445h0.849C7.194,12.229,7.394,12.43,7.394,12.675 M14.348,7.325c0,0.246-0.201,0.446-0.446,0.446h-5c-0.246,0-0.446-0.2-0.446-0.446c0-0.245,0.2-0.446,0.446-0.446h5C14.146,6.879,14.348,7.08,14.348,7.325 M7.394,7.325c0,0.246-0.2,0.446-0.446,0.446H6.099c-0.245,0-0.446-0.2-0.446-0.446c0-0.245,0.201-0.446,0.446-0.446h0.849C7.194,6.879,7.394,7.08,7.394,7.325"></path>
                            </svg>
                        <span class="ml-4">Role Management</span>
                    </a>
                </li>

                <li class="relative px-6 py-3">

                    {{-- membuat kondisi aktif pada menu yang sedang dipilih --}}
                    @if (
                        request()->is('admin/menu') ||
                        request()->is('admin/menu/*') ||
                        request()->is('admin/*/menu') ||
                        request()->is('admin/*/menu/*') 
                    )
                        
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-serv-bg" aria-hidden="true"></span>
                        
                    @endif

                    <a class="inline-flex items-center w-full text-sm font-light transition-colors duration-150 hover:text-gray-800" href="{{ route('admin.menu.index') }}">
                        <svg  width="28" height="28" class="svg-icon" viewBox="0 0 20 20">
                                <path d="M10,2.172c-4.324,0-7.828,3.504-7.828,7.828S5.676,17.828,10,17.828c4.324,0,7.828-3.504,7.828-7.828S14.324,2.172,10,2.172M10,17.004c-3.863,0-7.004-3.141-7.004-7.003S6.137,2.997,10,2.997c3.862,0,7.004,3.141,7.004,7.004S13.862,17.004,10,17.004M10,8.559c-0.795,0-1.442,0.646-1.442,1.442S9.205,11.443,10,11.443s1.441-0.647,1.441-1.443S10.795,8.559,10,8.559 M10,10.619c-0.34,0-0.618-0.278-0.618-0.618S9.66,9.382,10,9.382S10.618,9.661,10.618,10S10.34,10.619,10,10.619 M14.12,8.559c-0.795,0-1.442,0.646-1.442,1.442s0.647,1.443,1.442,1.443s1.442-0.647,1.442-1.443S14.915,8.559,14.12,8.559 M14.12,10.619c-0.34,0-0.618-0.278-0.618-0.618s0.278-0.618,0.618-0.618S14.738,9.661,14.738,10S14.46,10.619,14.12,10.619 M5.88,8.559c-0.795,0-1.442,0.646-1.442,1.442s0.646,1.443,1.442,1.443S7.322,10.796,7.322,10S6.675,8.559,5.88,8.559 M5.88,10.619c-0.34,0-0.618-0.278-0.618-0.618S5.54,9.382,5.88,9.382S6.498,9.661,6.498,10S6.22,10.619,5.88,10.619"></path>
                            </svg>
                        <span class="ml-4">Menu Management</span>
                    </a>
                </li>


                <li class="relative px-6 py-3">

                    {{-- membuat kondisi aktif pada menu yang sedang dipilih --}}
                    @if (
                        request()->is('admin/profil') ||
                        request()->is('admin/profil/*') ||
                        request()->is('admin/*/profil') ||
                        request()->is('admin/*/profil/*') 
                    )
                        
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-serv-bg" aria-hidden="true"></span>
                        
                    @endif

                    <a class="inline-flex items-center w-full text-sm font-light transition-colors duration-150 hover:text-gray-800" href="{{ route('admin.profil.index') }}">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="24" height="24" fill="white" />
                            <circle cx="10.5" cy="5.5" r="2.75" stroke="#082431" stroke-width="1.5" />
                            <path d="M3.75 18.2581C3.75 14.6638 6.66376 11.75 10.2581 11.75H11.7419C15.3362 11.75 18.25 14.6638 18.25 18.2581C18.25 18.8059 17.8059 19.25 17.2581 19.25H4.74194C4.1941 19.25 3.75 18.8059 3.75 18.2581Z" stroke="#082431" stroke-width="1.5" />
                            <path d="M17.75 14.299C18.1642 13.5816 19.0816 13.3358 19.799 13.75C20.5165 14.1642 20.7623 15.0816 20.3481 15.799L19.5981 17.0981L17.9314 19.9848C17.715 20.3596 17.383 20.6541 16.985 20.8241L15.4217 21.4919C15.3603 21.518 15.2911 21.478 15.2831 21.4119L15.0797 19.7241C15.028 19.2944 15.117 18.8596 15.3333 18.4848L17 15.5981L17.75 14.299Z" fill="white" />
                            <path d="M17 15.5981L15.3333 18.4848C15.117 18.8596 15.028 19.2944 15.0797 19.7241L15.2831 21.4119C15.2911 21.478 15.3603 21.518 15.4217 21.4919L16.985 20.8241C17.383 20.6541 17.715 20.3596 17.9314 19.9848L19.5981 17.0981M17 15.5981L17.75 14.299C18.1642 13.5816 19.0816 13.3358 19.799 13.75V13.75C20.5165 14.1642 20.7623 15.0816 20.3481 15.799L19.5981 17.0981M17 15.5981L19.5981 17.0981" stroke="#082431" stroke-width="1.5" />
                        </svg>
                        <span class="ml-4">My Profile</span>
                    </a>
                </li>
                
                <li class="relative px-6 py-3">

                    {{-- membuat kondisi aktif pada menu yang sedang dipilih --}}
                    @if (
                        request()->is('admin/activity') ||
                        request()->is('admin/activity/*') ||
                        request()->is('admin/*/activity') ||
                        request()->is('admin/*/activity/*') 
                    )
                        
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-serv-bg" aria-hidden="true"></span>
                        
                    @endif

                    <a class="inline-flex items-center w-full text-sm font-light transition-colors duration-150 hover:text-gray-800" href="{{ route('admin.activity.index') }}">
                        <i class="fas fa-chalkboard-teacher fa-lg"></i>
                        <span class="ml-4">Log Activity</span>
                    </a>
                </li>

                <li class="relative px-6 py-3">
                    <a class="inline-flex items-center w-full text-sm font-light transition-colors duration-150 hover:text-gray-800" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="24" height="24" fill="white" />
                            <path d="M15 7.5V7C15 4.79086 13.2091 3 11 3H7C4.79086 3 3 4.79086 3 7V17C3 19.2091 4.79086 21 7 21H11C13.2091 21 15 19.2091 15 17V16.5" stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                            <path d="M18.5 9.5L20.8586 11.8586C20.9367 11.9367 20.9367 12.0633 20.8586 12.1414L18.5 14.5" stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                            <path d="M9.5 12L20 12" stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                        </svg>

                        <span class="ml-4">Log out</span>

                        <form action="{{ route('logout') }}" method="POST" id="logout-form" style="display: none;">@csrf</form>
                    </a>
                </li>
            </ul>
        @endcan

        @can('mentor')
            <ul class="mt-6">
                <li class="relative px-6 py-3">

                    {{-- membuat kondisi aktif pada menu yang sedang dipilih --}}
                    @if (
                        request()->is('member/dashboard') ||
                        request()->is('member/dashboard/*') ||
                        request()->is('member/*/dashboard') ||
                        request()->is('member/*/dashboard/*') 
                    )
                        
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-serv-bg" aria-hidden="true"></span>
                        
                    @endif

                    <a class="inline-flex items-center w-full text-sm font-medium text-gray-800 transition-colors duration-150 hover:text-gray-800" href="{{ route('member.dashboard.index') }}">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.5 16V9.02123C19.5 7.75027 18.896 6.55494 17.8728 5.80101L12.3728 1.74838C10.9618 0.708674 9.03823 0.708675 7.6272 1.74838L2.1272 5.80101C1.10401 6.55494 0.5 7.75027 0.5 9.02123V16C0.5 18.2091 2.29086 20 4.5 20H5.75C6.57843 20 7.25 19.3284 7.25 18.5V16C7.25 15.1716 7.92157 14.5 8.75 14.5H11.25C12.0784 14.5 12.75 15.1716 12.75 16V18.5C12.75 19.3284 13.4216 20 14.25 20H15.5C17.7091 20 19.5 18.2091 19.5 16Z" fill="#082431" />
                        </svg>
                        <span class="ml-4">Dashboard</span>
                    </a>

                </li>
            </ul>

            <ul>
                <li class="relative px-6 py-3">

                    {{-- membuat kondisi aktif pada menu yang sedang dipilih --}}
                    @if (
                        request()->is('member/service') ||
                        request()->is('member/service/*') ||
                        request()->is('member/*/service') ||
                        request()->is('member/*/service/*') 
                    )
                        
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-serv-bg" aria-hidden="true"></span>
                        
                    @endif

                    <a class="inline-flex items-center w-full text-sm font-light transition-colors duration-150 hover:text-gray-800" href="{{ route('member.service.index') }}">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="3" y="3" width="7" height="7" rx="2" stroke="#082431" stroke-width="1.5" />
                            <rect x="3" y="14" width="7" height="7" rx="2" stroke="#082431" stroke-width="1.5" />
                            <rect x="14" y="3" width="7" height="7" rx="2" stroke="#082431" stroke-width="1.5" />
                            <rect x="14" y="14" width="7" height="7" rx="2" stroke="#082431" stroke-width="1.5" />
                        </svg>
                        <!-- Active Icons -->
                        <!-- <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="3" y="3" width="7" height="7" rx="2" fill="#082431" />
                            <rect x="3" y="14" width="7" height="7" rx="2" fill="#082431" />
                            <rect x="14" y="3" width="7" height="7" rx="2" fill="#082431" />
                            <rect x="14" y="14" width="7" height="7" rx="2" fill="#082431" />
                        </svg> -->
                        <span class="ml-4">My Gallery's</span>
                        <span class="inline-flex items-center justify-center px-3 py-2 ml-auto text-xs font-bold leading-none text-green-500 rounded-full bg-serv-green-badge">{{ auth()->user()->service()->count() }}</span>

                    </a>
                </li>

                <li class="relative px-6 py-3">

                    {{-- membuat kondisi aktif pada menu yang sedang dipilih --}}
                    @if (
                        request()->is('member/materi') ||
                        request()->is('member/materi/*') ||
                        request()->is('member/*/materi') ||
                        request()->is('member/*/materi/*') 
                    )
                        
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-serv-bg" aria-hidden="true"></span>
                        
                    @endif

                    <a class="inline-flex items-center w-full text-sm font-light transition-colors duration-150 hover:text-gray-800" href="{{ route('member.materi.index') }}">
                            <svg width="28" height="28" class="svg-icon" viewBox="0 0 20 20">
                                <path d="M17.237,3.056H2.93c-0.694,0-1.263,0.568-1.263,1.263v8.837c0,0.694,0.568,1.263,1.263,1.263h4.629v0.879c-0.015,0.086-0.183,0.306-0.273,0.423c-0.223,0.293-0.455,0.592-0.293,0.92c0.07,0.139,0.226,0.303,0.577,0.303h4.819c0.208,0,0.696,0,0.862-0.379c0.162-0.37-0.124-0.682-0.374-0.955c-0.089-0.097-0.231-0.252-0.268-0.328v-0.862h4.629c0.694,0,1.263-0.568,1.263-1.263V4.319C18.5,3.625,17.932,3.056,17.237,3.056 M8.053,16.102C8.232,15.862,8.4,15.597,8.4,15.309v-0.89h3.366v0.89c0,0.303,0.211,0.562,0.419,0.793H8.053z M17.658,13.156c0,0.228-0.193,0.421-0.421,0.421H2.93c-0.228,0-0.421-0.193-0.421-0.421v-1.263h15.149V13.156z M17.658,11.052H2.509V4.319c0-0.228,0.193-0.421,0.421-0.421h14.308c0.228,0,0.421,0.193,0.421,0.421V11.052z"></path>
                            </svg>
                        <span class="ml-4">Struktur Organisasi</span>
                        {{-- <span class="inline-flex items-center justify-center px-3 py-2 ml-auto text-xs font-bold leading-none text-green-500 rounded-full bg-serv-green-badge">{{ auth()->user()->order_freelancer()->count() }}</span> --}}
                    </a>
                </li>

                <li class="relative px-6 py-3">

                    {{-- membuat kondisi aktif pada menu yang sedang dipilih --}}
                    @if (
                        request()->is('member/program') ||
                        request()->is('member/program/*') ||
                        request()->is('member/*/program') ||
                        request()->is('member/*/program/*') 
                    )
                        
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-serv-bg" aria-hidden="true"></span>
                        
                    @endif

                    <a class="inline-flex items-center w-full text-sm font-light transition-colors duration-150 hover:text-gray-800" href="{{ route('member.program.index') }}">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="3.25" y="2.25" width="17.5" height="19.5" rx="4.75" stroke="#082431" stroke-width="1.5" />
                            <line x1="7.75" y1="7.25" x2="10.25" y2="7.25" stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                            <line x1="7.75" y1="11.25" x2="16.25" y2="11.25" stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                            <line x1="7.75" y1="15.25" x2="16.25" y2="15.25" stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                        <span class="ml-4">Program Kerja</span>
                        <span class="inline-flex items-center justify-center px-3 py-2 ml-auto text-xs font-bold leading-none text-green-500 rounded-full bg-serv-green-badge">{{ auth()->user()->program()->count() }}</span>
                    </a>
                </li>

                <li class="relative px-6 py-3">

                    @if (
                        request()->is('member/event') ||
                        request()->is('member/event/*') ||
                        request()->is('member/*/event') ||
                        request()->is('member/*/event/*') 
                    )
                        
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-serv-bg" aria-hidden="true"></span>
                        
                    @endif

                    <a class="inline-flex items-center w-full text-sm font-light transition-colors duration-150 hover:text-gray-800" href="{{ route('member.event.index') }}">
                         <i class="fas fa-chalkboard-teacher fa-lg"></i>
                        <span class="ml-4">Events</span>
                        <span class="inline-flex items-center justify-center px-3 py-2 ml-auto text-xs font-bold leading-none text-green-500 rounded-full bg-serv-green-badge">{{ auth()->user()->order_freelancer()->count() }}</span>
                    </a>
                </li>

                <li class="relative px-6 py-3">

                    {{-- membuat kondisi aktif pada menu yang sedang dipilih --}}
                    @if (
                        request()->is('member/profile') ||
                        request()->is('member/profile/*') ||
                        request()->is('member/*/profile') ||
                        request()->is('member/*/profile/*') 
                    )
                        
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-serv-bg" aria-hidden="true"></span>
                        
                    @endif

                    <a class="inline-flex items-center w-full text-sm font-light transition-colors duration-150 hover:text-gray-800" href="{{ route('member.profile.index') }}">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="24" height="24" fill="white" />
                            <circle cx="10.5" cy="5.5" r="2.75" stroke="#082431" stroke-width="1.5" />
                            <path d="M3.75 18.2581C3.75 14.6638 6.66376 11.75 10.2581 11.75H11.7419C15.3362 11.75 18.25 14.6638 18.25 18.2581C18.25 18.8059 17.8059 19.25 17.2581 19.25H4.74194C4.1941 19.25 3.75 18.8059 3.75 18.2581Z" stroke="#082431" stroke-width="1.5" />
                            <path d="M17.75 14.299C18.1642 13.5816 19.0816 13.3358 19.799 13.75C20.5165 14.1642 20.7623 15.0816 20.3481 15.799L19.5981 17.0981L17.9314 19.9848C17.715 20.3596 17.383 20.6541 16.985 20.8241L15.4217 21.4919C15.3603 21.518 15.2911 21.478 15.2831 21.4119L15.0797 19.7241C15.028 19.2944 15.117 18.8596 15.3333 18.4848L17 15.5981L17.75 14.299Z" fill="white" />
                            <path d="M17 15.5981L15.3333 18.4848C15.117 18.8596 15.028 19.2944 15.0797 19.7241L15.2831 21.4119C15.2911 21.478 15.3603 21.518 15.4217 21.4919L16.985 20.8241C17.383 20.6541 17.715 20.3596 17.9314 19.9848L19.5981 17.0981M17 15.5981L17.75 14.299C18.1642 13.5816 19.0816 13.3358 19.799 13.75V13.75C20.5165 14.1642 20.7623 15.0816 20.3481 15.799L19.5981 17.0981M17 15.5981L19.5981 17.0981" stroke="#082431" stroke-width="1.5" />
                        </svg>
                        <span class="ml-4">My Profile</span>
                    </a>
                </li>

                <li class="relative px-6 py-3">
                    <a class="inline-flex items-center w-full text-sm font-light transition-colors duration-150 hover:text-gray-800" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="24" height="24" fill="white" />
                            <path d="M15 7.5V7C15 4.79086 13.2091 3 11 3H7C4.79086 3 3 4.79086 3 7V17C3 19.2091 4.79086 21 7 21H11C13.2091 21 15 19.2091 15 17V16.5" stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                            <path d="M18.5 9.5L20.8586 11.8586C20.9367 11.9367 20.9367 12.0633 20.8586 12.1414L18.5 14.5" stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                            <path d="M9.5 12L20 12" stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                        </svg>

                        <span class="ml-4">Log out</span>

                        <form action="{{ route('logout') }}" method="POST" id="logout-form" style="display: none;">@csrf</form>
                    </a>
                </li>
            </ul>
        @endcan

        @can('member')
            <ul class="mt-6">
                <li class="relative px-6 py-3">

                    {{-- membuat kondisi aktif pada menu yang sedang dipilih --}}
                    @if (
                        request()->is('member/dashboard') ||
                        request()->is('member/dashboard/*') ||
                        request()->is('member/*/dashboard') ||
                        request()->is('member/*/dashboard/*') 
                    )
                        
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-serv-bg" aria-hidden="true"></span>
                        
                    @endif

                    <a class="inline-flex items-center w-full text-sm font-medium text-gray-800 transition-colors duration-150 hover:text-gray-800" href="{{ route('member.dashboard.index') }}">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.5 16V9.02123C19.5 7.75027 18.896 6.55494 17.8728 5.80101L12.3728 1.74838C10.9618 0.708674 9.03823 0.708675 7.6272 1.74838L2.1272 5.80101C1.10401 6.55494 0.5 7.75027 0.5 9.02123V16C0.5 18.2091 2.29086 20 4.5 20H5.75C6.57843 20 7.25 19.3284 7.25 18.5V16C7.25 15.1716 7.92157 14.5 8.75 14.5H11.25C12.0784 14.5 12.75 15.1716 12.75 16V18.5C12.75 19.3284 13.4216 20 14.25 20H15.5C17.7091 20 19.5 18.2091 19.5 16Z" fill="#082431" />
                        </svg>
                        <span class="ml-4">Dashboard</span>
                    </a>

                </li>
            </ul>

            <ul>
                

                <li class="relative px-6 py-3">

                    {{-- membuat kondisi aktif pada menu yang sedang dipilih --}}
                    @if (
                        request()->is('member/request') ||
                        request()->is('member/request/*') ||
                        request()->is('member/*/request') ||
                        request()->is('member/*/request/*') 
                    )
                        
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-serv-bg" aria-hidden="true"></span>
                        
                    @endif

                    <a class="inline-flex items-center w-full text-sm font-light transition-colors duration-150 hover:text-gray-800" href="{{ route('member.request.index') }}">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="2.25" y="1.25" width="19.5" height="21.5" rx="4.75" stroke="#082431" stroke-width="1.5" />
                            <rect x="11.3" y="7" width="1.4" height="10" rx="0.7" fill="#082431" />
                            <rect x="17" y="11" width="1.4" height="10" rx="0.7" transform="rotate(90 17 11)" fill="#082431" />
                        </svg>
                        <span class="ml-4">My Gallery</span>
                        <span class="inline-flex items-center justify-center px-3 py-2 ml-auto text-xs font-bold leading-none text-green-500 rounded-full bg-serv-green-badge">{{ auth()->user()->order_buyer()->count() }}</span>
                    </a>
                </li>

                {{-- <li class="relative px-6 py-3">

                    @if (
                        request()->is('member/order') ||
                        request()->is('member/order/*') ||
                        request()->is('member/*/order') ||
                        request()->is('member/*/order/*') 
                    )
                        
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-serv-bg" aria-hidden="true"></span>
                        
                    @endif

                    <a class="inline-flex items-center w-full text-sm font-light transition-colors duration-150 hover:text-gray-800" href="{{ route('member.order.index') }}">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="3.25" y="2.25" width="17.5" height="19.5" rx="4.75" stroke="#082431" stroke-width="1.5" />
                            <line x1="7.75" y1="7.25" x2="10.25" y2="7.25" stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                            <line x1="7.75" y1="11.25" x2="16.25" y2="11.25" stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                            <line x1="7.75" y1="15.25" x2="16.25" y2="15.25" stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                        <span class="ml-4">My Class</span>
                        <span class="inline-flex items-center justify-center px-3 py-2 ml-auto text-xs font-bold leading-none text-green-500 rounded-full bg-serv-green-badge">{{ auth()->user()->order_freelancer()->count() }}</span>
                    </a>
                </li> --}}

                <li class="relative px-6 py-3">

                    {{-- membuat kondisi aktif pada menu yang sedang dipilih --}}
                    @if (
                        request()->is('member/profile') ||
                        request()->is('member/profile/*') ||
                        request()->is('member/*/profile') ||
                        request()->is('member/*/profile/*') 
                    )
                        
                        <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-serv-bg" aria-hidden="true"></span>
                        
                    @endif

                    <a class="inline-flex items-center w-full text-sm font-light transition-colors duration-150 hover:text-gray-800" href="{{ route('member.profile.index') }}">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="24" height="24" fill="white" />
                            <circle cx="10.5" cy="5.5" r="2.75" stroke="#082431" stroke-width="1.5" />
                            <path d="M3.75 18.2581C3.75 14.6638 6.66376 11.75 10.2581 11.75H11.7419C15.3362 11.75 18.25 14.6638 18.25 18.2581C18.25 18.8059 17.8059 19.25 17.2581 19.25H4.74194C4.1941 19.25 3.75 18.8059 3.75 18.2581Z" stroke="#082431" stroke-width="1.5" />
                            <path d="M17.75 14.299C18.1642 13.5816 19.0816 13.3358 19.799 13.75C20.5165 14.1642 20.7623 15.0816 20.3481 15.799L19.5981 17.0981L17.9314 19.9848C17.715 20.3596 17.383 20.6541 16.985 20.8241L15.4217 21.4919C15.3603 21.518 15.2911 21.478 15.2831 21.4119L15.0797 19.7241C15.028 19.2944 15.117 18.8596 15.3333 18.4848L17 15.5981L17.75 14.299Z" fill="white" />
                            <path d="M17 15.5981L15.3333 18.4848C15.117 18.8596 15.028 19.2944 15.0797 19.7241L15.2831 21.4119C15.2911 21.478 15.3603 21.518 15.4217 21.4919L16.985 20.8241C17.383 20.6541 17.715 20.3596 17.9314 19.9848L19.5981 17.0981M17 15.5981L17.75 14.299C18.1642 13.5816 19.0816 13.3358 19.799 13.75V13.75C20.5165 14.1642 20.7623 15.0816 20.3481 15.799L19.5981 17.0981M17 15.5981L19.5981 17.0981" stroke="#082431" stroke-width="1.5" />
                        </svg>
                        <span class="ml-4">My Profile</span>
                    </a>
                </li>

                <li class="relative px-6 py-3">
                    <a class="inline-flex items-center w-full text-sm font-light transition-colors duration-150 hover:text-gray-800" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="24" height="24" fill="white" />
                            <path d="M15 7.5V7C15 4.79086 13.2091 3 11 3H7C4.79086 3 3 4.79086 3 7V17C3 19.2091 4.79086 21 7 21H11C13.2091 21 15 19.2091 15 17V16.5" stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                            <path d="M18.5 9.5L20.8586 11.8586C20.9367 11.9367 20.9367 12.0633 20.8586 12.1414L18.5 14.5" stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                            <path d="M9.5 12L20 12" stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                        </svg>

                        <span class="ml-4">Log out</span>

                        <form action="{{ route('logout') }}" method="POST" id="logout-form" style="display: none;">@csrf</form>
                    </a>
                </li>
            </ul>
        @endcan

    </div>
</aside>
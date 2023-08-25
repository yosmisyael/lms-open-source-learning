<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div> <a href="/" class="nav_logo"> <i class="bi bi-book-half nav_logo-icon"></i> <span class="nav_logo-name">LMS</span> </a>
            <div class="nav_list"> 
                <a href="/users/{{ auth()->user()->username }}/dashboard/courses" class="nav_link {{ Request::is('users/'.auth()->user()->username.'/dashboard/courses') ? 'active' : '' }}"> 
                    <i class='bx bxs-dashboard nav_icon' ></i><span class="nav_name">Courses</span> 
                </a>
                <a href="/users/{{ auth()->user()->username }}/dashboard/profile" class="nav_link {{ Request::is('users/'.auth()->user()->username.'/dashboard/profile') ? 'active' : '' }}"> 
                    <i class='bx bxs-user-circle nav_icon'></i> <span class="nav_name">Profile</span> 
                </a> 
            </div>
        </div> 
        
        <form action="/logout" method="POST" class="nav_link" id="logout-form" >
            @csrf
            <i class='bx bx-log-out nav_icon' id="logout-link" style="cursor: pointer"></i>
            <button type="submit" class="nav_name btn btn-danger">SignOut</button>
        </form>
    </nav>
</div>
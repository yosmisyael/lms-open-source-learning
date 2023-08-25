<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div> <a href="#" class="nav_logo"> <i class="bi bi-book-half text-light"></i> <span class="nav_logo-name">LMS Administrator</span> </a>
            <div class="nav_list"> 
                <a href="/admin/dashboard/users" class="nav_link {{ Request::is('admin/dashboard/users') ? 'active' : '' }}"> 
                    <i class='bx bxs-user-detail nav_icon'></i> <span class="nav_name">User List</span> 
                </a> 
                <a href="/admin/dashboard/courses" class="nav_link {{ Request::is('admin/dashboard/courses') ? 'active' : '' }}"> 
                    <i class='bx bxs-school nav_icon'></i></i> <span class="nav_name">Courses List</span> 
                </a> 
                <a href="/admin/dashboard/tests" class="nav_link {{ Request::is('admin/dashboard/tests') ? 'active' : '' }}"> 
                    <i class='bx bxs-edit-alt nav_icon'></i> <span class="nav_name">Test List</span> 
                </a> 
            </div>
        </div> 
        
        <form action="/admin/logout" method="POST" class="nav_link" id="logout-form" >
            @csrf
            <i class='bx bx-log-out nav_icon' id="logout-link" style="cursor: pointer"></i>
            <button type="submit" class="nav_name btn btn-danger">SignOut</button>
        </form>
    </nav>
</div>
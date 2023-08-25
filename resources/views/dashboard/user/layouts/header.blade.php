<header class="header" id="header">
    <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    <div class="header_img" style="background-color: #E7E3E3">
        
        @if (auth()->user()->image === null)
            <i class="bi bi-person-fill text-dark fs-3"></i>            
        @else
            <img src="{{ asset('storage/'.auth()->user()->image) }}" alt="profile-picture"> 
        @endif
    </div>
</header>
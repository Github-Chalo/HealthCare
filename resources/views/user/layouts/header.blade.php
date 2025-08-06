<div class="navbar" id="scrollNavbar">
    <div class="logo-section">
        <div class="logo">
            <img src="{{ asset('/images/logo.svg') }}" width="150" alt="sdfsf">
        </div>
        <div class="links">
            <a href="{{ route('user.dashboard') }}" class="{{ request()->routeIs('user.dashboard') ? 'active' : '' }}">Home</a>
            {{-- <a href="{{ route('user.findCare') }}" class="{{ request()->routeIs('user.findCare') ? 'active' : '' }}">Patient Monitor</a> --}}
            <a href="{{ route('user.myChart') }}">My Chart</a>
        </div>
    </div>
    <div class="menu">
        <h3>menu</h3>
    </div>
</div>


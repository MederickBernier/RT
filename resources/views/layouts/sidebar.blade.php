<!-- Sidebar -->
<div id="sidebar" class="sidebar-custom-styles">
    <!-- ...other sidebar content... -->

    <!-- Navigation Links -->
    <nav class="sidebar-nav">
        <a href="#" class="sidebar-link">
            <!-- SVG Icon for Link 1 -->
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <!-- Placeholder path for Icon 1 -->
                <circle cx="12" cy="12" r="10"></circle>
            </svg>
            <span>Link 1</span>
        </a>
        <a href="#" class="sidebar-link">
            <!-- SVG Icon for Link 2 -->
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <!-- Placeholder path for Icon 2 -->
                <polygon points="5 3 19 12 5 21 5 3"></polygon>
            </svg>
            <span>Link 2</span>
        </a>
        <a href="#" class="sidebar-link">
            <!-- SVG Icon for Link 3 -->
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <!-- Placeholder path for Icon 3 -->
                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                <line x1="3" y1="9" x2="21" y2="9"></line>
                <line x1="9" y1="21" x2="9" y2="9"></line>
            </svg>
            <span>Link 3</span>
        </a>

        <hr class="sidebar-separator">
    </nav>

   <!-- Roster Section -->
    <div id="raiderSection" class="raider-section">
        @include('raid-management.roster')
    </div>
</div>

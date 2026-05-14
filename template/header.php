<!-- Google Fonts & Icons -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

<header class="main-header">
    <div class="header-left">
        <!-- Burger icon always visible -->
        <span class="material-symbols-outlined burger-menu" onclick="toggleSidebar()">menu</span>
    </div>
    
    <div class="header-center">
        <div id="live-clock">00:00:00 | January 01, 1970</div>
    </div>

    <div class="header-right">
        <div class="profile-container">
            <span class="material-symbols-outlined profile-icon" onclick="toggleDropdown()">account_circle</span>
            <div id="profile-dropdown" class="dropdown-content">
                <a href="profile.php"><span class="material-symbols-outlined">person</span> My Account</a>
                <a href="logs.php"><span class="material-symbols-outlined">history</span> Activity Logs</a>
                <hr>
                <a href="logout.php" class="logout-link"><span class="material-symbols-outlined">logout</span> Logout</a>
            </div>
        </div>
    </div>
</header>

<style>
    :root {
        --navy: #000080;
        --white: #ffffff;
        --sidebar-width: 250px;
    }
    body { font-family: 'Poppins', sans-serif; margin: 0; transition: padding-left 0.3s ease; }
    
    /* When sidebar is active on desktop, push the body content */
    body.sidebar-open { padding-left: var(--sidebar-width); }

    .main-header {
        height: 60px;
        background: var(--white);
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 20px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        position: sticky;
        top: 0;
        z-index: 1000;
    }

    #live-clock { font-weight: 500; color: #333; font-size: 0.9rem; }
    .burger-menu { cursor: pointer; user-select: none; font-size: 28px; color: var(--navy); }
    
    .profile-container { position: relative; }
    .profile-icon { cursor: pointer; font-size: 32px; color: #555; }

    .dropdown-content {
        display: none;
        position: absolute;
        right: 0;
        background-color: white;
        min-width: 180px;
        box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
        border-radius: 8px;
        overflow: hidden;
        margin-top: 10px;
    }

    .dropdown-content a {
        color: #333;
        padding: 12px 16px;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 14px;
    }

    .dropdown-content a:hover { background-color: #f1f1f1; }
    .logout-link { color: #dc3545 !important; }
    .show { display: block !important; }

    @media (max-width: 768px) {
        body.sidebar-open { padding-left: 0; }
    }
</style>

<script>
    function updateClock() {
        const now = new Date();
        const options = { year: 'numeric', month: 'long', day: 'numeric' };
        const timeStr = now.toLocaleTimeString('en-US', { hour12: true, hour: '2-digit', minute: '2-digit', second: '2-digit' });
        const dateStr = now.toLocaleDateString('en-US', options);
        document.getElementById('live-clock').innerText = `${timeStr} | ${dateStr}`;
    }
    setInterval(updateClock, 1000);
    updateClock();

    function toggleDropdown() {
        document.getElementById("profile-dropdown").classList.toggle("show");
    }

    window.onclick = function(event) {
        if (!event.target.matches('.profile-icon')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            for (var i = 0; i < dropdowns.length; i++) {
                if (dropdowns[i].classList.contains('show')) {
                    dropdowns[i].classList.remove('show');
                }
            }
        }
    }
</script>
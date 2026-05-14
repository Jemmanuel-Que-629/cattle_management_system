<aside id="sidebar" class="sidebar">
    <div class="sidebar-logo">
        <img src="<?php echo defined('BASE_URL') ? BASE_URL : ''; ?>images/logo.jpg" alt="Logo" style="width: 80px; height: auto; border-radius: 50%;" onerror="this.style.display='none'">
        <div style="margin-top: 10px; font-size: 0.9rem;">Cattle Management System</div>
    </div>

    <nav class="sidebar-nav">
        <a href="dashboard.php" class="nav-link">
            <span class="material-symbols-outlined">dashboard</span> Dashboard
        </a>
        <a href="inventory.php" class="nav-link">
            <span class="material-symbols-outlined">inventory_2</span> Inventory
        </a>
        <a href="users.php" class="nav-link">
            <span class="material-symbols-outlined">group</span> Users
        </a>
        <a href="settings.php" class="nav-link">
            <span class="material-symbols-outlined">settings</span> Settings
        </a>
    </nav>
</aside>

<div id="overlay" onclick="toggleSidebar()"></div>

<style>
    .sidebar {
        width: var(--sidebar-width);
        height: 100vh;
        background-color: var(--navy);
        color: var(--white);
        position: fixed;
        left: 0;
        top: 0;
        /* Start off-screen for both desktop and mobile */
        transform: translateX(-100%);
        transition: transform 0.3s ease;
        z-index: 1001;
        display: flex;
        flex-direction: column;
        box-shadow: 2px 0 10px rgba(0,0,0,0.3);
    }

    /* Active state for both desktop and mobile */
    .sidebar.active {
        transform: translateX(0);
    }

    .sidebar-logo {
        padding: 30px 20px;
        text-align: center;
        font-weight: 600;
        border-bottom: 1px solid rgba(255,255,255,0.1);
    }

    .sidebar-nav {
        padding: 20px 0;
        flex-grow: 1;
    }

    .nav-link {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 15px 25px;
        color: white;
        text-decoration: none;
        transition: background 0.2s;
        font-size: 15px;
    }

    .nav-link:hover {
        background: rgba(255,255,255,0.1);
    }

    #overlay {
        display: none;
        position: fixed;
        width: 100vw;
        height: 100vh;
        background: rgba(0,0,0,0.4);
        z-index: 1000;
        top: 0;
        left: 0;
    }

    /* Overlay only appears on mobile to prevent accidental clicks */
    @media (max-width: 768px) {
        #overlay.active {
            display: block;
        }
    }
</style>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById("sidebar");
        const overlay = document.getElementById("overlay");
        const body = document.body;

        sidebar.classList.toggle("active");
        overlay.classList.toggle("active");
        
        // Only push the body content if screen is wider than mobile
        if (window.innerWidth > 768) {
            body.classList.toggle("sidebar-open");
        }
    }
</script>
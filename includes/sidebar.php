<div class="sidebar">
    <h4>AML</h4>
    <hr>
    <ul class="nav flex-column">

        <!-- Dashboard Dropdown -->
        <li class="nav-item">
            <a class="nav-link text-white d-flex justify-content-between align-items-center"
                href="index.php"
                aria-expanded="false">
                <span><i class="fas fa-home me-2"></i>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-white d-flex justify-content-between align-items-center"
                data-bs-toggle="collapse"
                href="#directoryMenu"
                role="button"
                aria-expanded="false"
                aria-controls="directoryMenu">
                <span><i class="fa-solid fa-folder me-2" style="color: #f2f2f3;"></i>Website Directory</span>
                <i class="fas fa-chevron-down dropdown-icon"></i>
            </a>
            <div class="collapse ps-3" id="directoryMenu">
                <a href="#" class="nav-link text-white small p-2" style="font-size: 15px;">Main</a>
                <a href="#" class="nav-link text-white small p-2" style="font-size: 15px;">Not Fround</a>
                <a href="#" class="nav-link text-white small p-2" style="font-size: 15px;">Inoperable</a>
            </div>
        </li>

        <!-- Upload Excel Dropdown -->
        <li class="nav-item">
            <a class="nav-link text-white d-flex justify-content-between align-items-center"
                data-bs-toggle="collapse"
                href="#searchingMenu"
                role="button"
                aria-expanded="false"
                aria-controls="searchingMenu">
                <span><i class="fa-solid fa-magnifying-glass me-2" style="color: #f2f2f3;"></i></i>Website Searching</span>
                <i class="fas fa-chevron-down dropdown-icon"></i>
            </a>
            <div class="collapse ps-3" id="searchingMenu">
                <a href="#" class="nav-link text-white small p-2" style="font-size: 15px;">Old Url</a>
                <a href="working.php" class="nav-link text-white small p-2" style="font-size: 15px;">Working</a>
            </div>
        </li>

        <!-- All Records Dropdown -->
        <li class="nav-item">
            <a class="nav-link text-white d-flex justify-content-between align-items-center"
                data-bs-toggle="collapse"
                href="#credentialMenu"
                role="button"
                aria-expanded="false"
                aria-controls="credentialMenu">
                <span><i class="fas fa-database me-2"></i>Credentials</span>
                <i class="fas fa-chevron-down dropdown-icon"></i>
            </a>
            <div class="collapse ps-3" id="credentialMenu">
                <a href="all_credential.php" class="nav-link text-white small p-2" style="font-size: 15px;">All Credentials</a>
                <a href="#" class="nav-link text-white small p-2" style="font-size: 15px;">Automated Credentials</a>
            </div>
        </li>
        <li class="nav-item"><a class="nav-link text-white" href="#">Alloted Websites</a></li>
    </ul>
</div>
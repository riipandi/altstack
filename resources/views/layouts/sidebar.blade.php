<nav id="sidebar" class="leading-tight fill">
    <div class="sidebar-header">
        <span class="font-semibold text-lg">{{ config('app.name') }}</span>
    </div>

    <ul class="list-reset mt-5">
        <li>
            <a href="{{ route('dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt mx-2"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="javascript:;">
                <i class="fas fa-fw fa-cash-register mx-2"></i> Example Menu 01
            </a>
        </li>
        <li>
            <a href="javascript:;" onclick="toggleHidden('transaksiProduk')" class="dropdown-toggle"><i class="fas fa-fw fa-database mx-2"></i> Example Menu 02</a>
            <ul class="collapse list-reset hidden" id="transaksiProduk">
                <li><a href="javascript:;">Sample sub menu</a></li>
                <li><a href="javascript:;">Sample sub menu</a></li>
                <li><a href="javascript:;">Sample sub menu</a></li>
                <li><a href="javascript:;">Sample sub menu</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" onclick="toggleHidden('transaksiKeuangan')" class="dropdown-toggle"><i class="fas fa-fw fa-tools mx-2"></i> Example Menu 03</a>
            <ul class="collapse list-reset hidden" id="transaksiKeuangan">
                <li><a href="javascript:;">Sample sub menu</a></li>
                <li><a href="javascript:;">Sample sub menu</a></li>
                <li><a href="javascript:;">Sample sub menu</a></li>
                <li><a href="javascript:;">Sample sub menu</a></li>
                <li><a href="javascript:;">Sample sub menu</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:;">
                <i class="fas fa-fw fa-users mx-2"></i> Example Menu 04
            </a>
        </li>
        <p>System</p>
        <li>
            <a href="javascript:;" onclick="toggleHidden('settingMenu')" class="dropdown-toggle"><i class="fas fa-fw fa-cogs mx-2"></i> Configuration</a>
            <ul class="collapse list-reset hidden" id="settingMenu">
                <li><a href="javascript:;">Sample sub menu</a></li>
                <li><a href="javascript:;">Sample sub menu</a></li>
                <li><a href="javascript:;">Sample sub menu</a></li>
                <li><a href="javascript:;">Sample sub menu</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" onclick="toggleHidden('utilitiesMenu')" class="dropdown-toggle"><i class="fas fa-fw fa-toolbox mx-2"></i> Tool Box</a>
            <ul class="collapse list-reset hidden" id="utilitiesMenu">
                <li><a href="javascript:;">Sample sub menu</a></li>
                <li><a href="javascript:;">Sample sub menu</a></li>
                <li><a href="javascript:;">Sample sub menu</a></li>
            </ul>
        </li>
        <p>Get Help</p>
        <li>
            <a href="javascript:;"><i class="fas fa-fw fa-book mx-2"></i> Documentation</a>
        </li>
        <li>
            <a href="javascript:;"><i class="fas fa-fw fa-mail-bulk mx-2"></i> Contact Support</a>
        </li>
    </ul>
    
    <ul class="list-reset CTAs">
        <li>
            <a href="//github.com/riipandi/laravel-tailwind" target="_new" class="bg-blue-dark hover:bg-white">Download source</a>
        </li>
        <li>
            <a href="//ripandi.id/" target="_new" class="bg-green hover:bg-white">Visit My Blog</a>
        </li>
    </ul>
</nav>

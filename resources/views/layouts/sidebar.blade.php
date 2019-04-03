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
            <a href="javascript:;" v-on:click="toggleClass('hidden', 'SubMenu1')" class="dropdown-toggle"><i class="fas fa-fw fa-database mx-2"></i> Example Menu 02</a>
            <ul class="collapse list-reset hidden" id="SubMenu1">
                <li><a href="javascript:;">Sample sub menu</a></li>
                <li><a href="javascript:;">Sample sub menu</a></li>
                <li><a href="javascript:;">Sample sub menu</a></li>
                <li><a href="javascript:;">Sample sub menu</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" v-on:click="toggleClass('hidden', 'SubMenu2')" class="dropdown-toggle"><i class="fas fa-fw fa-tools mx-2"></i> Example Menu 03</a>
            <ul class="collapse list-reset hidden" id="SubMenu2">
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
            <a href="javascript:;" v-on:click="toggleClass('hidden', 'SubMenu3')" class="dropdown-toggle"><i class="fas fa-fw fa-wrench mx-2"></i> Configuration</a>
            <ul class="collapse list-reset hidden" id="SubMenu3">
                <li>
                    <a href="javascript:;" v-on:click="toggleClass('hidden', 'ChildMenu1')" class="dropdown-child">Sample sub menu</a>
                    <ul class="collapse list-reset hidden" id="ChildMenu1">
                        <li><a href="javascript:;">Sample child menu</a></li>
                        <li><a href="javascript:;">Sample child menu</a></li>
                        <li><a href="javascript:;">Sample child menu</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" v-on:click="toggleClass('hidden', 'ChildMenu2')" class="dropdown-child">Sample sub menu</a>
                    <ul class="collapse list-reset hidden" id="ChildMenu2">
                        <li><a href="javascript:;">Sample child menu</a></li>
                        <li><a href="javascript:;">Sample child menu</a></li>
                    </ul>
                </li>
                <li><a href="javascript:;">Sample sub menu</a></li>
                <li><a href="javascript:;">Sample sub menu</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" v-on:click="toggleClass('hidden', 'SubMenu4')" class="dropdown-toggle"><i class="fas fa-fw fa-toolbox mx-2"></i> Tool Box</a>
            <ul class="collapse list-reset hidden" id="SubMenu4">
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
            <a href="//github.com/ruhaycreative/gram" target="_new" class="bg-blue-dark hover:bg-white">Download source</a>
        </li>
        <li>
            <a href="//ruhaycreative.co.id/" target="_new" class="bg-green hover:bg-white">Visit Our Site</a>
        </li>
    </ul>

</nav>

<div id="theme-switcher" {{ $attributes->merge(['class' => 'theme-switcher']) }}>
    <button type="button" id="theme-switcher-light" class="inline-flex items-center px-3 py-2 text-sm font-medium bg-gray-200 border-2 border-gray-200 theme-switcher-button theme-switcher-light dark:bg-black dark:border-black focus:outline-none" title="Light">
        <x-heroicon-o-sun class="w-auto h-5 mr-1 -ml-1"/> Light
    </button>
    <button type="button" id="theme-switcher-dark" class="inline-flex items-center px-3 py-2 text-sm font-medium bg-gray-200 border-2 border-gray-200 theme-switcher-button theme-switcher-dark dark:bg-black dark:border-black focus:outline-none" title="Dark">
        <x-heroicon-o-moon class="w-auto h-5 mr-1 -ml-1"/> Dark
    </button>
    <button type="button" id="theme-switcher-auto" class="inline-flex items-center px-3 py-2 text-sm font-medium bg-gray-200 border-2 border-gray-200 theme-switcher-button theme-switcher-auto dark:bg-black dark:border-black focus:outline-none" title="Auto">
        <x-heroicon-o-light-bulb class="w-auto h-5 mr-1 -ml-1"/> Auto
    </button>
</div>

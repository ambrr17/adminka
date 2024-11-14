<?php

use Livewire\Volt\Component;

new class extends Component {
    //
};
?>
<aside id="sidebar" x-data="{
    sidebarState: 0,
    stateArr: ['open', 'hidden', 'close'],
    initSidebarState() {
        let index = this.stateArr.indexOf(localStorage.getItem('sidebarState'))
        this.sidebarState = (index && index > 0) ? index : 0
        localStorage.setItem('sidebarState', this.stateArr[this.sidebarState])
        document.querySelector('#sidebar').setAttribute('data-sidebarState', localStorage.getItem('sidebarState'))
    },
    changeSidebarState() {
        this.sidebarState++
        if (this.sidebarState == this.stateArr.length) this.sidebarState = 0
        localStorage.setItem('sidebarState', this.stateArr[this.sidebarState])
        document.querySelector('#sidebar').setAttribute('data-sidebarState', localStorage.getItem('sidebarState'))
    },
}" x-init="initSidebarState"
    class="bg-gray-100 border-r border-gray-200 sidebar dark:bg-gray-900 dark:border-gray-700">
    <div class="sidebar-header">
        <!-- Logo -->
        <a id="sidebar-logo" href="{{ route('dashboard') }}" wire:navigate>
            <x-application-logo class="block w-auto text-gray-800 fill-current h-9 dark:text-gray-200" />
        </a>

        <button x-on:click="changeSidebarState" class="sidebar-state-btn">
            <svg x-show="stateArr[sidebarState] != 'close'" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <svg x-show="stateArr[sidebarState] == 'close'" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
        </button>
    </div>
    <ul class="w-full text-gray-900 dark:text-gray-100 menu rounded-box">
        <li><a>Item 1</a></li>
        <li>
            <details open>
                <summary>Parent</summary>
                <ul>
                    <li><a>Submenu 1</a></li>
                    <li><a>Submenu 2</a></li>
                    <li>
                        <details open>
                            <summary>Parent</summary>
                            <ul>
                                <li><a>Submenu 1</a></li>
                                <li><a>Submenu 2</a></li>
                            </ul>
                        </details>
                    </li>
                </ul>
            </details>
        </li>
        <li><a>Item 3</a></li>
    </ul>
</aside>

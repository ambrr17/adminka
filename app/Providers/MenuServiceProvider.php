<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Menu\Laravel\Html;
use Spatie\Menu\Laravel\Link;
use Spatie\Menu\Laravel\Menu;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Menu::macro('main', function () {
            return Menu::new()
                ->addClass('w-full text-gray-900 dark:text-gray-100 menu rounded-box')
                ->add(Html::raw('<a href="' . route('dashboard') . '" wire:navigate>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                    </svg>
                                        <span>' . __('Dashboard') . '</span>
                                </a>'))
                ->submenu(function (Menu $menu) {
                    $menu->prepend(Html::raw('
                    <details open>
                        <summary>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                            </svg>
                                <span>' . __('Users') . '</span>
                        </summary>
                    '))->submenu(function (Menu $submenu) {
                        $submenu->add(Link::to('#', 'Submenu 1'))
                            ->add(Link::to('#', 'Submenu 2'));
                        // ->submenu(function (Menu $subSubMenu) {
                        //     $subSubMenu->prepend(Html::raw('<details open><summary>Parent</summary>')->addParentClass('details'))
                        //         ->add(Link::to('#', 'Submenu 1'))
                        //         ->add(Link::to('#', 'Submenu 2'))
                        //         ->append(Html::raw('</details>'));
                        // });
                    })->append(Html::raw('</details>'));
                });//->add(Link::to('#', 'Item 3'));
        });
    }
}

<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\Models\CompanyInfo;
use App\Models\Page;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // data sending to header-sidebar-footer-pages
        view()->composer(['layouts.header', 'layouts.footer', 'layouts.header'], function($view){
            $companyInfo = CompanyInfo::where('status', true)->first();
            $pages = Page::where('status', true)->get();
            $view->with('companyInfo', $companyInfo);
            $view->with('pages', $pages);
        });
    }
}

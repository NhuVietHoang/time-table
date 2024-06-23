<?php

namespace App\Providers;

use App\Repositories\Document\DocumentRepository;
use App\Repositories\Group\GroupRepository;
use App\Repositories\Schedule\ScheduleRepository;
use App\Repositories\Task\TaskRepository;
use App\Services\GroupService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(
            GroupRepository::class,
            DocumentRepository::class,
            ScheduleRepository::class,
            TaskRepository::class

        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        view()->composer('components.sidebar', function ($view) {
            $groupService = app(GroupService::class);
            $groupUsers = $groupService->getUserGroup();
            $view->with('groupUsers', $groupUsers);
        });
    }
}

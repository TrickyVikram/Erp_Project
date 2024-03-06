<?php

use App\Admin\Controllers\UserControllers;
use App\Admin\Controllers\StudentControllers;
use App\Admin\Controllers\RouteTableControllers;
use App\Models\RouteTable;

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('route-tables', RouteTableControllers::class);
    $routes = RouteTable::all();
    foreach ($routes as $key => $value) {
        eval($value['routes']);
    }
});

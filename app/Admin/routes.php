<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');


    $router->resource('goods-comment', GoodsCommentController::class);

    $router->resource('stat', StatController::class);

    $router->resource('exam', ExamController::class);

    $router->resource('class', ClassController::class);

    $router->resource('student', StudentController::class);

    $router->resource('subject', SubjectController::class);


});

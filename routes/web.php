<?php
Route::get('/', function() {
    return redirect(route('marcar'));
});
    Route::post('marcar/finalizar','MarcarController@finalizar')->name('finalizar');
    Route::get('marcar/consulta','MarcarController@marcar')->name('medico');
    Route::get('marcar','MarcarController@index')->name('marcar');


Route::get('home', function() {
    return redirect(route('admin.dashboard'));
});

Route::name('admin.')->prefix('admin')->middleware('auth')->group(function() {
    Route::get('dashboard', 'DashboardController')->name('dashboard');
    Route::get('consultas', 'ConsultasController@consulta')->name('consultas');


    Route::get('users/roles', 'UserController@roles')->name('users.roles');
    Route::resource('users', 'UserController', [
        'names' => [
            'index' => 'users'
        ]
    ]);
});

Route::middleware('auth')->get('logout', function() {
    Auth::logout();
    return redirect(route('login'))->withInfo('Você acabou de sair de sua conta!');
})->name('logout');

Auth::routes(['verify' => true]);

Route::name('js.')->group(function() {
    Route::get('dynamic.js', 'JsController@dynamic')->name('dynamic');
});

// Get authenticated user
Route::get('users/auth', function() {
    return response()->json(['user' => Auth::check() ? Auth::user() : false]);
});

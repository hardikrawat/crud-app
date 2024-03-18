<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\userData;

//public routes (no authentication required)

Route::get('/login', 'LoginController@showLoginForm')->name('login');

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

//private routes (require authentication)
Route::group(['middleware' => ['auth']], function () {
    Route::get("/home", function () {
        return view("create");
    });

    Route::get("/create", function () {
        return view("create");
    })->name('create');

    Route::post('/create/save', function (Request $request) {
        try {
            $data = $request->all();
            $obj = new userData();
            $obj->fill($data);
            $obj->save();
            return redirect(route('read'));
        } catch (\Exception $e) {
            redirect(route('create'));
            echo '<pre>Something went wrong!<br>' . $e->getMessage() . '</pre><hr><a href="http://127.0.0.1:8000/create">Retry?</a>';
        }
    });

    Route::get(
        '/read',
        function () {
            $obj = userData::all();
            return view("read", ['obj' => $obj]);
        }
    )->name('read');

    Route::get('/update/{id}', function ($id) {
        $obj = userData::find($id);
        return view("update", ['obj' => $obj]);
    })->name('edit');

    Route::put('/update/save/{id}', function (Request $request, $id) {
        $obj = userData::find($id);
        $obj->fill($request->all());
        $obj->save();
        return redirect(route('read'));
    })->name('update');

    Route::get('/delete/{id}', function ($id) {
        userData::destroy($id);
        return redirect(route('read'));
    })->name('delete');
});

Auth::routes();
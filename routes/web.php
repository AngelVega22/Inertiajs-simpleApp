<?php
use App\Http\Controllers\Auth\LoginController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('login' ,[LoginController::class,'create']) ->name('login');
Route::post('login' ,[LoginController::class,'store']);
Route::post('logout' , [LoginController::class,'destroy'])->middleware('auth');
Route::middleware('auth')->group(function () {


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Inicio');
});

Route::get('/usuarios', function () {
    // sleep(2);

    return Inertia::render('Users/Index',[
        'users' =>  User::query()
        ->when(Request::input('search'), function ($query, $search){
            $query -> where('name', 'like', "%{$search}%");
        })
        ->paginate(10)
        ->withQueryString()
         ->through(fn($user) => [
            'id' => $user -> id ,
            'name' => $user ->name,
            'email' => $user -> email,
            'can' => [
                'edit' => Auth::user()->can('edit',$user)
            ]
         ]),
         'filters' => Request::only(['search']),
         'can' => [
             'createUser' =>Auth::user()-> can('create',User::class)
         ]
    ]);

});

Route::get('/usuarios/crear', function () {
    return Inertia::render('Users/Create');
})
// ->middleware('can:create,App\Models\User');
->can('create', 'App\Models\User');
Route::post('/usuarios', function () {
  $attributes =  Request::validate([
        'name' => 'required',
        'email' => ['required', 'email'],
        'password' => 'required'
    ]);

    User::create($attributes);

    return redirect('/usuarios');
});


Route::get('/configuracion', function () {
    return Inertia::render('Configuracion');
});



});
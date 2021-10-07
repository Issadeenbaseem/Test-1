<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['web']], function () {
    // your routes here
});

Route::post('register',function(Request $request)
{
    $attres = $request->validate([
        'name' => 'required',
        'email' => 'required',
        'password' => 'required'

    ]);

   $user=User::create([
        'name' => $attres['name'],
        'email' => $attres['email'],
        'password' => bcrypt($attres['password'])
    ]);

    return response (
        [
             'message' => 'user Ctreate Successfully',
             "user" => $user
        ]
    );
});

Route::post('login',function(Request $request){
    $credentials = $request->only('email','password');

    if(!auth()->attempt($credentials))
    {
            throw ValidationException::withMessages([
                'email' => 'Invalid User'
            ]);
    }


    return response()->json(auth()->user(),201);

});

Route::post('logout',function(Request $request)
{
     auth()->guard('web')->logout();

     $request->session()->invalidate();

     $request->session()->regeneratToken();
     
     return response()->json(null,200);


     

});
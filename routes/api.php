<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ITIPostController;
use App\Http\Controllers\api\CatController;

//for sanctum
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('posts', [App\Http\Controllers\api\PostController::class, 'index']);
// Route::get('posts/{post}', [App\Http\Controllers\api\PostController::class, 'show']);

Route::apiResource('posts', ITIPostController::class);
Route::apiResource('cats', CatController::class);


// sanctum

Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);
 
    try{
    $user = User::where('email', $request->email)->first();
 
    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

 
    return $user->createToken($request->device_name)->plainTextToken;
}
catch(ValidationException $e) {
    return response()->json([
        'errors' => $e->errors(),
    ], 422);
}
});



// Route::post('/sanctum/token', function (Request $request) {
//     // Validate the incoming request data
//     $request->validate([
//         'email' => 'required|email',
//         'password' => 'required',
//         'device_name' => 'required',
//     ]);

//     // Attempt to find a user by email
//     $user = User::where('email', $request->email)->first();

//     // Check if the user exists
//     if (! $user) {
//         return response()->json(['message' => 'User not found'], 404);
//     }

//     // Check if the password is correct
//     if (Hash::check($request->password, $user->password)) {
//         // Password is correct; create and return a token
//         return $user->createToken($request->device_name)->plainTextToken;
//     } else {
//         // Password is incorrect, return an error response
//         return response()->json(['message' => 'Invalid credentials'],401);
// }
// });

Route::post("/logout",function (Request $request){
    // dd($request);
    // dd(Auth::guard('sanctum')->user());
    $user = Auth::guard('sanctum')->user();
    // dd($user->currentAccessToken());
    $token = $user ->currentAccessToken();
    $token->delete();
    return response("logout",200);


});
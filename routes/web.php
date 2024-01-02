<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });



use App\Http\Controllers\PostController;
use App\Http\Controllers\DbController;
use App\Http\Controllers\CatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\api;

Route::get('/',[PostController::class, 'home'])->name("blog.home");
/// using postcontroller
// Route::get('/posts/{id}',[PostController::class, 'postShow'])->name("post.show");
// Route::get('/posts',[PostController::class, 'postList'])->name("blog.posts");

/// using db controller to show and list posts on db 
Route::get('/posts',[DbController::class,'index'])->name('blog.posts')->middleware('auth');
Route::get('/posts/{id}',[DbController::class, 'show'])->name("post.show")->middleware('auth');
Route::get('/posts/delete/{id}',[DbController::class, 'destroy'])->name("post.delete")->middleware('auth');
Route::get('/post_create',[DbController::class, 'create'])->name("post.create")->middleware('auth');
Route::post('/postsstore',[DbController::class,'store'])->name("posts.store")->middleware('auth');
Route::get('/postsedit/{id}',[DbController::class,'edit'])->name("post.edit")->middleware('auth');
Route::put('/postsupdate/{id}',[DbController::class,'update'])->name("post.update")->middleware('auth');




##_____using resources____

Route::resource('cats',CatController::class)->middleware('admin');
// Route::resource('cats',CatController::class)->middleware('admin');

Route::resource('users',UserController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('endpoint/posts', [App\Http\Controllers\api\PostController::class, 'index'])
// ->name('allposts');


// social login 
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});
 
// Route::get('/auth/callback', function () {
//     $user = Socialite::driver('github')->user();
//     dd($user);
//     // $user->token
// });

Route::get('/auth/callback', function () {
    $githubUser = Socialite::driver('github')->stateless()->user();

    // dd($githubUser);

    $userAuth = User::where("email",$githubUser->email)->first();

    if($userAuth){
        // dd($githubUser);
        // Auth::login($user);

        return redirect('/posts');

    }else{
    // if($githubUser->)

    $user = User::updateOrCreate([
        'github_id' => $githubUser->id,
    ], [
        'name' => $githubUser->name ? $githubUser->name : $githubUser->nickname,
        'email' => $githubUser->email,
        'password'=> $githubUser->password? $githubUser->password : $githubUser->email,
        'github_token' => $githubUser->token,
        'github_refresh_token' => $githubUser->refreshToken,
    ]);
    
}

Auth::login($user);
 
return redirect('/posts');

});
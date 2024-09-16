<?php


use Illuminate\Support\Facades\Route;
use Modules\SocialAuth\Http\Controllers\SocialAuthController;
use Modules\SocialAuth\Http\Middleware\CheckProvider;

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

Route::get('login/{provider}', [SocialAuthController::class, 'redirect'])->middleware(CheckProvider::class)->name('social.login');
Route::get('login/{provider}/callback', [SocialAuthController::class, 'callback'])->middleware(CheckProvider::class);

// Route::get('login/google', function () {
//     return response()->json([
//         'redirect_url' => Socialite::driver('google')->stateless()->redirect()->getTargetUrl()
//     ]);
//     // return Socialite::driver('google')->stateless()->redirect()->getTargetUrl();
// })->name('social.login.google');

// Route::get('login/google/callback', function () {
//     try {
//         $user = Socialite::driver('google')->stateless()->user();
//         return App::make(GoogleAuthService::class)->loginOrCreate($user);
//     } catch (\Exception $e) {
//         Log::error('Error fetching user: ', ['exception' => $e->getMessage()]);
//         return redirect(config('app.fe_url') . '/login');  // Redirect hoặc xử lý lỗi
//     }
// });


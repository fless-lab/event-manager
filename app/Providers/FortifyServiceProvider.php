<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Hash;
use App\Actions\Fortify\CreateNewUser;
use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use Illuminate\Support\Facades\RateLimiter;
use App\Actions\Fortify\UpdateUserProfileInformation;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        Fortify::loginView(function(){
            return view("auth.login.index");
        });

        Fortify::registerView(function(){
            return view("auth.register.index");
        });

        Fortify::requestPasswordResetLinkView(function(){
            return view("auth.forgot-password.index");
        });

        Fortify::resetPasswordView(function($request){
            return view("auth.reset-password.index",["request"=>$request]);
        });

        Fortify::verifyEmailView(function(){
            return view("auth.verify-email.index");
        });


        Fortify::authenticateUsing(function(Request $request){
            $user = User::where("email",$request->username)->orWhere("username",$request->username)->first();
            if($user&&Hash::check($request->password, $user->password)){
                $request->session()->flash('status', "Welcome back to your account, ".Str::ucfirst($user->firstname));
                return $user;
            }
        });

        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;

            return Limit::perMinute(5)->by($email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}

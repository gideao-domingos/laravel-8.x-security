# Laravel-Security

This project aims to present the main security implementations in an application using Laravel 8.

##This project has the following security implementations:

**Auth** - Register, Login, Logout;
**Access control matrix** - with dynamic roles and permissions;
**Authorization**;
**Force create strong passwords**;
**Force users to reset password periodically (30 days by default)**
**Logs** - to monitor user access to the application
**Frontend validation** - with javascript;
**Backend validation**;
**DDOS** protection;
**XSS** Protection.

And in the future other implementations will be made.

This project was inspired by the following projects:
 * https://github.com/wmomesso/laravel_acl
 * https://github.com/codeanddeploy/laravel8-authentication-example.git
And this tutorial: https://laraveldaily.com/password-expired-force-change-password-every-30-days/

#Installation

1. Open \App\Providers\AuthServiceProvider.php and comment the body of function boot(), this will be look like: 
    ```
    public function boot(){
        /*
        $this->registerPolicies();
        $permissions = Permission::all();
        foreach ($permissions as $permission) {
            Gate::define($permission->name,
                function (User $user) use ($permission) {
                    return $user->hasPermission($permission);
                }
            );
        }
        */
    }
    ```
2.Run the command ```composer install``` (To use just download and install the dependencies).

3. Create and insert database credentials in file .ENV.

4.Run the command ```php artisan migrate --seed```.

5. Open \App\Providers\AuthServiceProvider.php and remove the comment the body of function boot(), this will be look like:
    ```
    public function boot(){
        /*
        $this->registerPolicies();
        $permissions = Permission::all();
        foreach ($permissions as $permission) {
            Gate::define($permission->name,
                function (User $user) use ($permission) {
                    return $user->hasPermission($permission);
                }
            );
        }
        */
    }
    ```
Done!!

##Credentials:

*User1
  - email: superadmin@gmail.com',
  - password: 12345678
            
*User2
  - email: gd@gmail.com
  - password: 12345678
        
##Author
Gideão Domingos

# Line Login For Laravel

> Basic with [PurinWang/LineLogin](https://github.com/PurinWang/Line_Login) make laravel version

## How to use
### composer require
```
composer require  purinwang/line_login_Laravel
```
### Add path to composer autoload and config/app.php
- composer.json
```
    "Purin\\LineLogin\\": "vendor/purinwang/Line_Login_laravel/src/"
```
- config/app.php -> provider block
```
    Purin\LineLogin\LineLoginServiceProvider::class,
```
- dump
```
    composer dump-autoload  
```
- laravel publish
```
    php artisan vendor:publish --provider="Purin\LineLogin\LineLoginServiceProvider
```
### laravel use (Don't forget add .env from .env.example)
- Line Login Button in blade
```
    @include('linelogin::linelogin',[url => 'YOUR URL'])
```
- Get LineLogin url to redirect
```
    $url = app('lineloginUrl');
    return redirect()->to($url)->send();
```

- Get LineLogin get data
```
    print_r(app('lineloginGetdata',[Request::get('code')]));
```

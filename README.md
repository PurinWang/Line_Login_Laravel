# Line Login For Laravel

> Basic with [PurinWang/LineLogin](https://github.com/PurinWang/Line_Login) make laravel version

## How to use
### composer require
```
composer require  purinwang/line_login_Laravel
```
### laravel publish
```
 php artisan vendor:publish --provider="Purin\LineLogin\LineLoginServiceProvider
```
### laravel use
- Get LineLogin url
```
    $url = app('lineloginUrl');
    return redirect()->to($url)->send();
```

- Get LineLogin get data
```
    print_r(app('lineloginGetdata',[Request::get('code')]));
```

# Line Login For Laravel

- Get LineLogin url
```
    $url = app('lineloginUrl');
    return redirect()->to($url)->send();
```

- Get LineLogin get data
```
    print_r(app('lineloginGetdata',[Request::get('code')]));
```
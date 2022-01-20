# `Laravel API Basic Concepts`

    - Handling Different methods
    - GET,POST,PATCH,DELETE
    - all, match

## `Using This Project`

    1. clone this repo
    2. cd <this_repo>
    3. composer install



## `Adding a Controller`

    NOTE : $request['key'] searches for the key in query and parameter, If found in both, Query is returned

## `Adding a Middleware`

```bash
php artisan make:middleware <MiddlewareName>
```

    NOTE : While adding middleware to kernel.php make sure the path is correct. For Custom middleware it should be something like : \App\Http\Middleware\LoggerMiddleWare::class, while for the existing one's it could be \Illuminate\...
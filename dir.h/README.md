# Laravel

## Route
This is Route in
routes/web.php
```php
Route::get('home',[FrontController::class,'checkLogin'])->name('route-main');
```
To use it
```php
{{ route('routeName') }}
```

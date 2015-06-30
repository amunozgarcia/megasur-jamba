# megasur-jamba (LARAVEL 5)
Package laravel desarrollado para informática Megasur


Para hacer que esto funcione hay que añadir en el fichero /config/app.php

'providers' => [
    Jamba\JambaServiceProvider::class
]

Con esto ya empieza la magia : )


## Usage Message

Muestro alerta con redirect

```php
public function store()
{
    Message::message('Welcome Aboard!');

    return redirect('/');
}
```

Funciones para usar

- `Message::info('Message')`
- `Message::success('Message')`
- `Message::error('Message')`
- `Message::warning('Message')`
- `Message::overlay('Modal Message', 'Modal Title')`
- `Message::alert('title','Message', 'tipo', (bool) keepOpen)`

Añadir en composer.json el siguiente comando artisan para que añada publicos los assets
```
"post-update-cmd": [
    "php artisan vendor:publish --tag=jamba --force"
],
```
Alternativa usando la funcion message():

```
/**
 * Destroy
 *
 * @return Response
 */
public function destroy()
{
    Auth::logout();

    Message::success('Mensaje');

    return redirect('/');
}
```
## Ejemplo

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="/vendor/megasur/jamba/css/metro.css">
</head>
<body>

<div class="container">
    @include('jamba::flash.message')

    <p>Welcome to my website...</p>
</div>

<script src="//code.jquery.com/jquery.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="/vendor/megasur/jamba/js/metro.js"></script>
@include('jamba::flash.alert')
<script>
    $('#flash-overlay-modal').modal();
</script>

</body>
</html>
```

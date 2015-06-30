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
    Flash::message('Welcome Aboard!');

    return Redirect::home();
}
```

Funciones para usar

- `Message::info('Message')`
- `Message::success('Message')`
- `Message::error('Message')`
- `Message::warning('Message')`
- `Message::overlay('Modal Message', 'Modal Title')`



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

    Message()->success('Mensaje');

    return home();
}

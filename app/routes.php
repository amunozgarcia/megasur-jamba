<?php
/*
| ----------------
| Webservice (consultas Webservice)
| ----------------
 */
Route::get('webservice/{consulta}/{parametro?}', 'Jamba\Ws\Controllers\WsController@get');

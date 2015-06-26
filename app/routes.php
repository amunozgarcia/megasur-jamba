<?php
/*
| ----------------
| Webservice (consultas Webservice)
| ----------------
 */
Route::get('ws/{consulta}/{parametro?}', 'Jamba\Ws\Controllers\WsController@get');

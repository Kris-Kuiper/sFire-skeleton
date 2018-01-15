<?php
use sFire\Router\Router;

#Error documents
Router :: any('403', '403') -> setModule('App') -> setController('403') -> setAction('index') -> setViewable(false);
Router :: any('404', '404') -> setModule('App') -> setController('404') -> setAction('index') -> setViewable(false);

#Home
Router :: get('', 'home.index') -> setModule('App')  -> setController('Home')-> setAction('index');
?>

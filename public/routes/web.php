<?php

    $routes = [
        ['method' => 'GET', 'path' => '/', 'handler' => 'Mlist@listMembers'],
        ['method' => 'GET', 'path' => '/add', 'handler' => 'Mlist@add'],
        ['method' => 'POST', 'path' => '/doneadd', 'handler' => 'Mlist@doneAdd'],
        ['method' => 'GET', 'path' => '/detail/{id}', 'handler' => 'Mlist@detail'],
        ['method' => 'GET', 'path' => '/edit/{id}', 'handler' => 'Mlist@edit'],
        ['method' => 'POST', 'path' => '/doneedit', 'handler' => 'Mlist@doneEdit'],
        ['method' => 'GET', 'path' => '/delete/{id}', 'handler' => 'Mlist@delete'],
    ];

?>
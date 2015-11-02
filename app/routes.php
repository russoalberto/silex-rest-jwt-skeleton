<?php

$app->mount($app['api'].'/books', new \MyApp\Controller\Provider\Book());

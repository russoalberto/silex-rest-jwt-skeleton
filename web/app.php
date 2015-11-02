<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

require __DIR__.'/../app/config/config_prod.php';

require __DIR__.'/../app/config/parameters.php';

require __DIR__.'/../app/routes.php';

require __DIR__.'/../app/providers.php';

require __DIR__.'/../src/index.php';

$app['http_cache']->run();

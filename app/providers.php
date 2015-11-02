<?php
use Silex\Provider\HttpCacheServiceProvider;
use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\MonologServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;

$now = new DateTime('now');

$app->register(new ServiceControllerServiceProvider());

$app->register(new DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver' => $app['driver'],
        'host' => $app['host'],
        'port' => $app['port'],
        'dbname' => $app['dbname'],
        'user' => $app['user'],
        'password' => $app['password'],
    ),
));

$app->register(new HttpCacheServiceProvider(), array('http_cache.cache_dir' => __DIR__.'/../app/cache'));

$app->register(new MonologServiceProvider(), array(
    'monolog.logfile' => __DIR__.'/../app/logs/'.$app['environment'].'/'.$now->format('Y-m-d').'.log',
    'monolog.level' => $app['log.level'],
    'monolog.name' => 'application',
));

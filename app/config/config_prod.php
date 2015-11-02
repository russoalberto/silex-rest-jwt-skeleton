<?php

// Prod CONFIGURATION
$app['environment'] = "prod";
$app['debug'] = false;
$app['log.level'] = Monolog\Logger::ERROR;
$app['api'] = '/api/v1';

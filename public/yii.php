<?php

defined('NON_YII_PATH') or define('NON_YII_PATH', false);
define('BASE_DIR', dirname(__DIR__));

define('YII_DEBUG', true);
define('YII_ENV_DEV', true);

require_once BASE_DIR . '/vendor/autoload.php';
require_once BASE_DIR . '/vendor/yiisoft/yii2/Yii.php';

$config = require_once BASE_DIR . '/config/main.php';

$app = new \yii\web\Application($config);
$app->run();
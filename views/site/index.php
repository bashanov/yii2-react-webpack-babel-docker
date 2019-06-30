<?php

use yii\web\View;

/**
 * @var View $this
 */

$this->title = "Yii + React + Webpack + Babel";

$this->registerJsFile('/dist/js/main.js');

?>

<div id="app"></div>

<button type="button" class="btn btn-primary">I'm green</button>
<?php
use Pho\Core\Application;
use Pho\Core\ContainerBuilderFactory;

$app = new Application(ContainerBuilderFactory::development());
return $app;

<?php

function part($name, $vars = []) {
  extract($vars);
  include __DIR__ . "/parts/{$name}.php";
}

<?php
function part(string $name, array $vars = []): void {
  extract($vars);
  include __DIR__ . "/parts/{$name}.php";
}

<?php
require_once __DIR__ . '/vendor/autoload.php';

use function Collect\collection;

$records = [
    'id' => 2135,
    'first_name' => 'John',
    'last_name' => 'Doe',
];

var_dump(collection($records)->toArray());

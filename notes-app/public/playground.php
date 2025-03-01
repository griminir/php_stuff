<?php

use Illuminate\Support\Collection;

require __DIR__.'/../vendor/autoload.php';

// use illuminate/collections to make an array of numbers to 10
$numbers = Collection::range(1, 10);

$stuff = new Collection([
    'foo',
    'bar',
    'baz'
]);

if ($stuff->contains('foo')) {
    echo 'yes';
} else {
    echo 'no';
}
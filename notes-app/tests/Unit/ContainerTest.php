<?php

use Core\Container;

test('it can resolve resolve something out of the container', function () {
    // arrange
    $container = new Container();
    $container->bind('test', fn() => 'test');
    // act
    $result = $container->resolve('test');
    // assert
    expect($result)->toBe('test');
});

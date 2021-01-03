<?php
  use PHPUnit\Framework\TestCase;

  function helloWorld() {
    return 'hello';
  }


  class ExampleTest extends TestCase {

    
    public function test_helloWorld_returns_value_as_expected() {
      $this->assertEquals('hello', helloWorld());
    }
  }
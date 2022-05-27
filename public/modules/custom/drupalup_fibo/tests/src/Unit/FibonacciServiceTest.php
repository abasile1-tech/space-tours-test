<?php

namespace Drupal\Tests\drupalup_fibo\Unit;

use Drupal\drupalup_fibo\FibonacciService;
use Drupal\Tests\UnitTestCase;

/**
 * Our main test class for the fibonacci service.
 */
class FibonacciServiceTest extends UnitTestCase {
  public function testSixthFibonacciNumber() {
    $fibonacciService = new FibonacciService();
    $fibonacciSequence = $fibonacciService->calcSomeFibos(6);
    $this->assertEquals(
      $fibonacciSequence[5],
      5
    );
  }
}

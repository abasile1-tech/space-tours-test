<?php

namespace Drupal\hello_world\Controller;

use Drupal\examples\Utility\DescriptionTemplateTrait;
use Symfony\Component\HttpFoundation\Response;

/**
 * Controller for Hooks example description page.
 *
 * This class uses the DescriptionTemplateTrait to display text we put in the
 * templates/description.html.twig file.
 */
class HelloWorldController {
  use DescriptionTemplateTrait;

  /**
   * {@inheritdoc}
   */
  protected function getModuleName() {
    return 'hello_world';
  }

  public function sayHello() {
      //echo '<h2>Implementing, defining, and invoking hooks</h2>';
      return new Response('<h3>Header</h3>');
  }

}
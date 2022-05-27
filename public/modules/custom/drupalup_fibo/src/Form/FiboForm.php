<?php

namespace Drupal\drupalup_fibo\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\drupalup_fibo\FibonacciService;

/**
 * Our simple Fibonacci form.
 */
class FiboForm extends FormBase {

  protected $fiboService;

  public function __construct(FibonacciService $fiboService)
  {
    $this->fiboService = $fiboService;
  }

  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('drupalup_fibo.calc_fibo')
    );
  }

  /**
   * {@inheritDoc}
   */
  public function getFormId()
  {
    return 'drupalup_fibo_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    //kint($this->fiboService);
    $form['fibo_numbers'] = [
      '#type' => 'textfield',
      '#title' => $this->t('How many Fibonacci numbers do you want to generate?'),
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Generate!'),
    ];

    return $form;
  }

  /**
   * {@inheritDoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    \Drupal::messenger()->addStatus(t('Our beautiful Fibonacci sequence is: '
    . implode(',',
    $this->fiboService->calcSomeFibos($form_state->getValue('fibo_numbers')))
  ));
  }
}

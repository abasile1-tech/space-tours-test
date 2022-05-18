<?php
/**
 * @file
 * contains \Drupal\rsvplist\Plugin\Block\RSVPBlock
 */
namespace Drupal\rsvplist\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Provides an 'RSVP' List Block
 * @Block(
 *  id = "rsvp_block",
 *  admin_label = @Translation("RSVP Block"),
 *  category = @Translation("RSVP List"),
 * )
 */

 class RSVPBlock extends BlockBase {
   /**
    * (@inheritdoc)
    */

    public function build() {
      //return array('#markup' => $this->t('My RSVP List Block'));
      return \Drupal::formBuilder()->getForm('Drupal\rsvplist\Form\RSVPForm');
    }
    public function blockAccess(AccountInterface $account) {
      /**
       * @var \Drupal\node\Entity\Node $node
       */
      $node = \Drupal::routeMatch()->getParameter('node');
      //print_r($node);
      $nid = $node->nid->value;
      //print_r($nid);
      if(is_numeric($nid)){
        return AccessResult::allowedIfHasPermission($account, 'view rsvplist');
      }
      return AccessResult::forbidden();
    }
 }
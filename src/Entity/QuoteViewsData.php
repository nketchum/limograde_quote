<?php

namespace Drupal\limograde_quote\Entity;

use Drupal\views\EntityViewsData;

/**
 * Provides Views data for Quote entities.
 */
class QuoteViewsData extends EntityViewsData {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    // Additional information for Views integration, such as table joins, can be
    // put here.

    return $data;
  }

}

<?php

namespace Drupal\limograde_quote\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Preview' block.
 *
 * @Block(
 *  id = "preview",
 *  admin_label = @Translation("Preview"),
 * )
 */
class Preview extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['preview']['#markup'] = '<div id="quote-preview-data"></div>';
    return $build;
  }

}

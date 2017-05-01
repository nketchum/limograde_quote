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
    $build['preview']['#markup'] = '<h5 class="panel-heading">Quote Preview</h5><div id="quote-preview-data" class="panel-body"><p><strong>Nothing to display.</strong></p></div>';
    return $build;
  }

}

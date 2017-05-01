<?php

/**
 * @file
 * Contains quote.page.inc.
 *
 * Page callback for Quote entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Quote templates.
 *
 * Default template: quote.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_quote(array &$variables) {
  // Fetch Quote Entity Object.
  $quote = $variables['elements']['#quote'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}

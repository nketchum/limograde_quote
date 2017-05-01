<?php

namespace Drupal\limograde_quote\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Quote entities.
 *
 * @ingroup limograde_quote
 */
interface QuoteInterface extends  ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  /**
   * Gets the Quote creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Quote.
   */
  public function getCreatedTime();

  /**
   * Sets the Quote creation timestamp.
   *
   * @param int $timestamp
   *   The Quote creation timestamp.
   *
   * @return \Drupal\limograde_quote\Entity\QuoteInterface
   *   The called Quote entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Quote published status indicator.
   *
   * Unpublished Quote are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Quote is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Quote.
   *
   * @param bool $published
   *   TRUE to set this Quote to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\limograde_quote\Entity\QuoteInterface
   *   The called Quote entity.
   */
  public function setPublished($published);

}

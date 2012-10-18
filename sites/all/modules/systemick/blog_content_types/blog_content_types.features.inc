<?php
/**
 * @file
 * blog_content_types.features.inc
 */

/**
 * Implements hook_node_info().
 */
function blog_content_types_node_info() {
  $items = array(
    'blog' => array(
      'name' => t('Blog'),
      'base' => 'node_content',
      'description' => t('A blog item by the site owner'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}

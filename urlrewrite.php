<?php
$arUrlRewrite=array (
  2 => 
  array (
    'CONDITION' => '#^/catalog/([A-Za-z0-9_.-]+)/\\?(.+)#',
    'RULE' => 'CODE=$1',
    'ID' => '',
    'PATH' => '/catalog/index.php',
    'SORT' => 60,
  ),
  4 => 
  array (
    'CONDITION' => '#^/product/([A-Za-z0-9_.-]+)/\\?(.+)#',
    'RULE' => 'CODE=$1',
    'ID' => '',
    'PATH' => '/catalog/detail.php',
    'SORT' => 60,
  ),
  0 => 
  array (
    'CONDITION' => '#^/brands/([A-Za-z0-9_.-]+)/\\?(.+)#',
    'RULE' => 'CODE=$1',
    'ID' => '',
    'PATH' => '/brands/detail.php',
    'SORT' => 60,
  ),
  6 => 
  array (
    'CONDITION' => '#^/journal/([A-Za-z0-9_.-]+)/\\?(.+)#',
    'RULE' => 'CODE=$1',
    'ID' => '',
    'PATH' => '/journal/detail.php',
    'SORT' => 100,
  ),
  3 => 
  array (
    'CONDITION' => '#^/catalog/([A-Za-z0-9_.-]+)/#',
    'RULE' => 'CODE=$1',
    'ID' => '',
    'PATH' => '/catalog/index.php',
    'SORT' => 100,
  ),
  5 => 
  array (
    'CONDITION' => '#^/product/([A-Za-z0-9_.-]+)/#',
    'RULE' => 'CODE=$1',
    'ID' => '',
    'PATH' => '/catalog/detail.php',
    'SORT' => 100,
  ),
  7 => 
  array (
    'CONDITION' => '#^/journal/([A-Za-z0-9_.-]+)/#',
    'RULE' => 'CODE=$1',
    'ID' => '',
    'PATH' => '/journal/detail.php',
    'SORT' => 100,
  ),
  1 => 
  array (
    'CONDITION' => '#^/brands/([A-Za-z0-9_.-]+)/#',
    'RULE' => 'CODE=$1',
    'ID' => '',
    'PATH' => '/brands/detail.php',
    'SORT' => 100,
  ),
);

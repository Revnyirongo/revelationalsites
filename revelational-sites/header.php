<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php bloginfo('name'); ?></title>
  <?php wp_head(); ?>
</head>
<body <?php body_class('bg-white text-gray-900 antialiased'); ?>>
  <!-- Top Bar -->
  <div class="bg-gray-800 text-white text-sm">
    <div class="container mx-auto flex justify-between items-center p-2">
      <div>
        <span>Email: <a href="mailto:info@revelation.africa" class="underline">info@revelation.africa</a></span>
        <span class="ml-4">📢 Latest: <a href="#" class="underline">Welcome to Revelational Sites!</a></span>
      </div>
      <div class="space-x-3">
        <a href="#" class="hover:text-blue-400">Facebook</a>
        <a href="#" class="hover:text-blue-400">Twitter</a>
        <a href="#" class="hover:text-blue-400">YouTube</a>
      </div>
    </div>
  </div>

  <!-- Logo and Main Navigation -->
  <header class="bg-white shadow">
    <div class="container mx-auto flex justify-between items-center p-4">
      <div class="text-xl font-bold text-blue-700"><?php bloginfo('name'); ?></div>
      <nav class="flex items-center space-x-4">
        <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => 'flex space-x-4')); ?>
        <a href="/donate" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Donate Now</a>
      </nav>
    </div>
  </header>

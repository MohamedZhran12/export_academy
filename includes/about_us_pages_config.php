<?php
$isPageDefined = isset($_GET['page']);
if ($isPageDefined && $_GET['page'] == 'our_achievements') {
  $name = 'Our Achievements';
  $categoryTable = 'our_achievements_categories';
  $mediaTable = 'our_achievements_images';
} else if ($isPageDefined && $_GET['page'] == 'our_management') {
  $name = 'Our Management';
  $categoryTable = 'our_management_categories';
  $mediaTable = 'our_management_images';
} else if ($isPageDefined && $_GET['page'] == 'gallery') {
  $name = 'Gallery';
  $categoryTable = 'gallery_categories';
  $mediaTable = 'gallery_images';
} else if ($isPageDefined && $_GET['page'] == 'mexa_tv') {
  $name = 'Mexa Tv';
  $categoryTable = 'mexa_tv_categories';
  $mediaTable = 'mexa_tv_videos';
} else {
  $_GET['page'] = 'csr';
  $name = 'CSR';
  $categoryTable = 'csr_categories';
  $mediaTable = 'csr_images';
}

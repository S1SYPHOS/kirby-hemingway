<!DOCTYPE html>
<html class="no-js" lang="<?= site()->language() ? site()->language()->code() : 'en' ?>">

  <?php snippet('head') ?>

  <?php
    $query = get('s');
    $intended = $page->intendedTemplate();
    // Body class for page type
    if($page->isHomePage()) { $type = 'blog'; }
    // TODO: Cleanup
    // elseif($page->isChildOf('home')) { $type = 'single'; }
    elseif($intended == 'archive') { $type = 'page page-template-template-archives-php'; }
    // elseif($page->isErrorPage()) { $type = 'error404'; }
    else { $type = 'page'; }

    // Body class for search results page
    // TODO: Remove search-no-results
    if($query && $site->search($query, 'title|intro|text')->count() == 0) { $search = ' search-no-results'; }
    elseif($query) { $search = ' search'; }
    else { $search = ''; }

    if ($intended == 'full-width') { $sidebar = 'full-width'; }
    elseif ($intended == 'no-sidebar') { $sidebar = 'center'; }
    else { $sidebar = 'left'; }
  ?>

  <body class="<?= $type ?><?= $search ?><?php e($page->coverimage()->isNotEmpty(), ' has-featured-image') ?>">
    <div class="big-wrapper">
      <div class="header-cover section bg-dark-light no-padding">
        <div class="header section" style="background-image: url(<?php if($banner = $site->banner()->toFile()) { echo $banner->crop(1280, 426, 85)->url(); } else { echo $site->url() . '/assets/images/header.jpg'; } ?>);">
          <div class="header-inner section-inner">
            <?php if ($logo = $site->logo()->toFile()) : ?>
            <div class="blog-logo">
              <a href="<?= $site->url() ?>" title="<?= $site->title()->html() ?> &mdash; <?= $site->tagline()->html() ?>" rel="home">
                <img src="<?= $logo->url() ?>" alt="<?= $site->title()->html() ?>">
              </a>
            </div><!-- /blog-logo -->
            <?php else : ?>
            <div class="blog-info">
              <!-- BLOG TITLE & TAGLINE -->
              <h2 class="blog-title">
                <a href="<?= $site->url() ?>" title="<?= $site->title()->html() ?> &mdash; <?= $site->tagline()->html() ?>" rel="home">
                <?= $site->title()->html() ?>
                </a>
              </h2>
              <h3 class="blog-description">
                <?= $site->tagline()->html() ?>
              </h3>
            </div><!-- /blog-info -->
            <?php endif ?>
          </div><!-- /header-inner -->
        </div><!-- /header -->
      </div><!-- /bg-dark -->

      <?php snippet('navigation') ?>

      <div class="wrapper section-inner">
        <div class="content <?= $sidebar ?>">
          <?php e(!$page->isHomePage(), '<div class="posts">') ?>

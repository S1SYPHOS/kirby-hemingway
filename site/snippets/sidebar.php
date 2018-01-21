<?php
  $tags = page('home')->children()->visible()->pluck('tags', ',', true);
  sort($tags);
?>

<div class="sidebar right" role="complementary">
  <div class="widget widget_search">
    <div class="widget-content">
      <?php snippet('search-form') ?>
    </div>
    <div class="clear"></div>
  </div>
  <div class="widget widget_recent_entries">
    <div class="widget-content">
      <h3 class="widget-title">Recent Posts</h3>
      <ul>
        <?php foreach(page('home')->children()->visible()->flip()->limit(5) as $recent) : ?>
        <li><a href="<?= $recent->url() ?>"><?= $recent->title()->html() ?></a></li>
        <?php endforeach?>
      </ul>
    </div><!-- /widget-content -->
    <div class="clear"></div>
  </div><!-- /widget -->
  <div class="widget widget_text">
    <div class="widget-content">
      <h3 class="widget-title">About <?= $site->title()->html() ?></h3>
      <?= $site->description()->kt() ?>
    </div><!-- /widget-content -->
    <div class="clear"></div>
  </div><!-- /widget -->
  <div class="widget widget_tag_cloud">
    <div class="widget-content">
      <h3 class="widget-title">Tags</h3>
      <div class="tagcloud">
        <?php foreach($tags as $tag) : ?>
        <?php $tagURL = url('home') . '/tag:' . urlencode($tag); ?>
        <a href="<?= $tagURL ?>"><?= $tag ?></a>
        <?php endforeach?>
      </div>
    </div><!-- /widget-content -->
    <div class="clear"></div>
  </div><!-- /widget -->
</div><!-- /sidebar -->

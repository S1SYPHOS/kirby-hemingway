<div class="post">
  <div class="content-inner">
    <div class="post-content">
      <?php e($site->error()->isNotEmpty(), $site->error()->kt()) ?>
      <?php snippet('search-form') ?>
    </div><!-- /post-content -->
  </div><!-- /post content-inner -->
  <div class="clear"></div>
</div><!-- /post -->

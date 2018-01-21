<?php if(!$page->isHomePage()) : ?>
<div class="post-header">
  <h1 class="post-title">
    <a href="<?= $item->url() ?>" rel="bookmark" title="<?= $item->title()->html() ?>">
      <?= $item->title()->html() ?>
    </a>
  </h1>
  <?php snippet('post/meta', $item) ?>
</div><!-- /post-header -->
<?php else : ?>
<div class="post-meta">
  <span class="post-date">
    <a href="<?= $item->url() ?>" title="<?= $item->title()->html() ?>">
      <?= $item->date('F j, Y') ?>
    </a>
  </span>
</div>
<?php endif ?>
<div class="post-content">
  <p><?= $item->covervideo() ?></p>
  <?= $item->text()->kt() ?>
</div><!-- /post-content -->

<?php if($image = $item->coverimage()->toFile()) : ?>
<div class="featured-media">
  <?php e($item->sticky()->int() == 1 && !$item->isHomePage(), '<span class="sticky-post">Sticky post</span>') ?>
  <a href="<?= $item->url() ?>" rel="bookmark" rel="bookmark" title="<?= $item->title()->html() ?>">
    <img src="<?= $image->resize(766, null, 85)->url() ?>" alt="<?php e($image->alt()->isNotEmpty(), $image->alt()->html()) ?>">
    <?php if($image->caption()->isNotEmpty()) : ?>
    <div class="media-caption-container">
      <p class="media-caption">
        <?= $image->caption()->html() ?>
      </p>
    </div>
    <?php endif ?>
  </a>
</div><!-- /featured-media -->
<?php endif ?>

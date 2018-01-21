<div class="post-header">
  <?php if(!$page->isHomePage()) : ?>
  <h1 class="post-title">
    <a href="<?= $item->url() ?>" rel="bookmark" title="<?= $item->title()->html() ?>">
      <?= $item->title()->html() ?>
    </a>
  </h1>
  <?php snippet('post/meta', $item) ?>
  <?php else : ?>
  <div class="post-meta">
    <span class="post-date">
      <a href="<?= $item->url() ?>" title="<?= $item->title()->html() ?>">
        <?= $item->date('F j, Y') ?>
      </a>
    </span>
  </div>
  <?php endif ?>
</div><!-- /post-header -->
<div class="post-content">
  <blockquote>
    <?= $item->text()->kt() ?>
    <p><cite>
      <?php e($item->link()->isNotEmpty(), '<a href="' . $item->link() . '">') ?>
      <?= $item->source()->html() ?>
      <?php e($item->link()->isNotEmpty(), '</a>') ?>
    </cite></p>
  </blockquote>
</div><!-- /post-content -->

<?php
  $categories = $item->category()->split();
  sort($categories);
  $lastCategory = a::last($categories);

  $tags = $item->tags()->split();
  sort($tags);
?>

<?php if(!$page->isHomePage()) : ?>
<div class="post-meta-bottom">
  <?php if($item->category()->isNotEmpty()) : ?>
  <p class="post-categories">
    <span class="category-icon"><span class="front-flap"></span></span> <?php foreach($categories as $category) : ?><?php $categoryURL = url('home') . '/category:' . urlencode($category); ?><?php e($category == $lastCategory, '<a href="' . $categoryURL . '">' . $category . '</a>', '<a href="' . $categoryURL . '">' . $category . '</a>, ') ?><?php endforeach ?>
  </p>
  <?php endif ?>
  <?php if($item->tags()->isNotEmpty()) : ?>
  <p class="post-tags">
    <?php foreach($tags as $tag) : ?><a href="<?= url('home') . '/tag:' . urlencode($tag) ?>"><?= $tag ?></a><?php endforeach ?>
  </p>
  <?php endif ?>
  <div class="clear"></div>
  <?php snippet('post/prevnext', $item) ?>
</div><!-- /post-meta-bottom -->
<?php endif ?>

<?php
  if (!function_exists('liClasses')) {
    function liClasses($input) {
      if($input->isActive() || $input->hasVisibleChildren()) {
        $children = $input->hasVisibleChildren() && $input !== page('home');
        $open = $input->isActive();

        $output = ' class="' . trim(($children ? 'has-children' : '') . ($open ? ' current-menu-item' : '')) . '"';

        return $output;
      }
    }
  }

  $items = $pages->visible();
  if($items->count()) :
?>
<?php foreach($items as $item) : ?>
<li<?= liClasses($item); ?>>
  <a href="<?= $item->url() ?>">
  <?= $item->title()->html() ?>
  </a>
  <?php
    $children = $item->children()->visible();
    if($children->count() > 0 && $item !== page('home')) :
  ?>
  <ul>
    <?php foreach($children as $child) : ?>
    <li<?= liClasses($child); ?>>
      <a href="<?= $child->url() ?>">
      <?= $child->title()->html() ?>
      </a>
      <?php
        $grandchildren = $child->children()->visible();
        if($grandchildren->count() > 0) :
      ?>
      <ul>
        <?php foreach($grandchildren as $grandchild) : ?>
        <li<?php e($grandchild->isActive(), ' class="current-menu-item"') ?>>
          <a href="<?= $grandchild->url() ?>">
          <?= $grandchild->title()->html() ?>
          </a>
        </li>
        <?php endforeach ?>
      </ul>
      <?php endif ?>
    </li>
    <?php endforeach ?>
  </ul>
  <?php endif ?>
</li>
<?php endforeach ?>
<?php endif ?>

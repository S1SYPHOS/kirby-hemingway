<?php snippet('header') ?>

<?php

/*

---------------------------------------
Home template
---------------------------------------

This template controls the view depending on user
input: It differentiates between 'search', 'query
variables' (or 'parameters', such as tags, author,
category etc) and the normal 'posts' (blog) view.

The $types array consists of all files inside the
directory 'site/snippets/home', which makes it quite
easy to customise available query variables.

*/

?>

<div class="posts">
  <?php
    if($query) { /* search results */
      snippet('home/search');
    } elseif ($params == 1 && !param('page') || $params > 1) {
      if($year && $month && $day) {
        snippet('home/day'); /* day */
      } elseif ($year && $month) {
        snippet('home/month'); /* month */
      } else {
        foreach($types as $type) { /* author, category, tag, year */
          $type = substr($type, 0, -4);
          if (param($type)) { snippet('home/' . $type); }
        }
      }
    } else { snippet('home/posts'); }
  ?>
</div><!-- /posts -->
<?php
  if($query) {
    snippet('home/partials/pagination', $paginationByResults);
  } elseif ($params == 1 && !param('page') || $params > 1) {
    if($year && $month && $day) {
      snippet('home/partials/pagination', $paginationByDay);
    } elseif ($year && $month) {
      snippet('home/partials/pagination', $paginationByMonth);
    } else {
      foreach($types as $type) {
        $type = substr($type, 0, -4);
        if (param($type)) {
          $type = ucfirst($type);
          $paginationByType = ${'paginationBy' . $type};
          snippet('home/partials/pagination', $paginationByType);
        }
      }
    }
  } else { snippet('home/partials/pagination', $pagination); }
?>

<?php snippet('footer') ?>

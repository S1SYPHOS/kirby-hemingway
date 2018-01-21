<head profile="http://gmpg.org/xfn/11">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>
    <?php e($page->isHomePage(),
      $site->title() . ' &#8211; ' . $site->tagline(),
      $page->title() . ' &#8211; ' . $site->title()
    ) ?>
  </title>

  <!-- CSS -->
  <link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i|Raleway:400,700" rel="stylesheet">
  <?= css('assets/style.css') ?>

  <?php if($site->color() != '#1abc9c') : ?>
  <style>
    .blog-search #searchsubmit,
    .blog-search #searchsubmit:hover,
    .content #respond input[type=submit]:hover,
    .featured-media .sticky-post,
    .post-content a.more-link:hover,
    .post-content fieldset legend,
    .post-content input[type=submit]:hover,
    .post-content input[type=reset]:hover,
    .post-content input[type=button]:hover {
      background-color: <?= $site->color() ?>
    }

    .blog-search #searchsubmit,
    .blog-search #searchsubmit:hover,
    .post-content .searchform #searchsubmit,
    .widget_search #searchsubmit,
    .widget_search #searchsubmit:hover {
      border-color: <?= $site->color() ?>
    }

    .dribbble-shot:hover,
    .flickr_badge_image a:hover img,
    .footer .dribbble-shot:hover img,
    .footer .flickr_badge_image a:hover img,
    .footer .tagcloud a:hover,
    .post-content .searchform #searchsubmit,
    .post-tags a:hover,
    .sidebar .tagcloud a:hover,
    .widget_search #searchsubmit,
    .widget_search #searchsubmit:hover,
    body::selection {
      background: <?= $site->color() ?>
    }

    #cancel-comment-reply-link,
    #cancel-comment-reply-link:hover,
    #wp-calendar a,
    #wp-calendar a:hover,
    #wp-calendar tfoot a:hover,
    .archive-nav a:hover,
    .blog .format-quote blockquote cite a:hover,
    .blog-menu a:hover,
    .blog-title a:hover,
    .comment-actions a:hover,
    .comment-meta-content cite a:hover,
    .comment-meta-content p a:hover,
    .comment-nav-below a:hover,
    .credits a:hover,
    .logged-in-as a,
    .logged-in-as a:hover,
    .post-categories a,
    .post-categories a:hover,
    .post-content a,
    .post-content a:hover,
    .post-meta a:hover,
    .post-nav a:hover,
    .post-title a:hover,
    .widget-title a,
    .widget-title a:hover,
    .widget_archive a,
    .widget_archive a:hover,
    .widget_categories a,
    .widget_categories a:hover,
    .widget_links a,
    .widget_links a:hover,
    .widget_meta a,
    .widget_meta a:hover,
    .widget_pages a,
    .widget_pages a:hover,
    .widget_recent_comments a,
    .widget_recent_comments a:hover,
    .widget_recent_entries a,
    .widget_recent_entries a:hover,
    .widget_rss a,
    .widget_rss a:hover,
    .widget_text a,
    .widget_text a:hover,
    .widgetmore a,
    .widgetmore a:hover,
    body a,
    body a:hover {
      color: <?= $site->color() ?>
    }

    .post-content .searchform #searchsubmit:hover {
      background: <?= $site->color() ?>;
      border-color: <?= $site->color() ?>
    }

    .post-tags a:hover:after {
      border-right-color: <?= $site->color() ?>
    }
  </style>
  <?php endif?>

  <!-- RSS Feed -->
  <link rel="alternate" type="application/rss+xml" title="<?= $site->title()->html() . ' &raquo; ' . page('feed')->title()->html() ?>" href="<?= url('feed') ?>">
</head>

<?php

/*

---------------------------------------
Lingonberry Settings
---------------------------------------

*/

// Kirby-specific
c::set('markdown.extra', true);

// Theme-specific
c::set('hemingway.comments', false);
c::set('hemingway.comments.nested', false);
c::set('hemingway.comments.preview', false);
c::set('hemingway.comments.enable-gravatar', false);
c::set('hemingway.comments.fallback-avatar', null);
c::set('hemingway.upload-quality', 85);

// Plugin-specific
c::set('comments.form.message.smartypants', false); // see 'Troubleshooting'
c::set('comments.form.email.required', true);
c::set('comments.custom-fields', array(array('name' => 'reply-to')));

/*

---------------------------------------
Routes
---------------------------------------

*/

// Omitting the home folder in URLs
if (!c::get('hemingway.comments')) {
  c::set('routes', array(
    array(
      'pattern' => '(:any)',
      'action'  => function($uid) {

        $page = page($uid);

        if(!$page) $page = page('home/' . $uid);
        if(!$page) $page = site()->errorPage();

        return site()->visit($page);

      }
    ),
    array(
      'pattern' => 'home/(:any)',
      'action'  => function($uid) {
        go($uid);
      }
    )
  ));
}


/*

---------------------------------------
Functions
---------------------------------------

*/

/*
 * Resizing images on upload / replacement
 */

kirby()->hook('panel.file.upload', 'resizeImage');
kirby()->hook('panel.file.replace', 'resizeImage');

function resizeImage($file) {
  if(!$file->page()->is(site())) {
    // set a max. dimension
    $maxDimension = 676;
    try {
      // check file type and dimensions
      if ($file->type() == 'image' and ($file->width() > $maxDimension)) {

        // get the original file path
        $originalPath = $file->dir() . '/' . $file->filename();
        // create a thumb and get its path
        $resizedImage = $file->resize($maxDimension, null, c::get('hemingway.upload-quality'));
        $resizedPath = $resizedImage->dir() . '/' . $resizedImage->filename();
        // replace the original image with the resized one
        copy($resizedPath, $originalPath);
        unlink($resizedPath);
        }
    } catch (Exception $e) {
        return response::error($e->getMessage());
    }
  }
}


/*
 * Generating archives by year, month & day
 */

// By year
function postsByYear($el) {
  return $el->date('Y');
}

// By month
function postsByMonth($el) {
  return $el->date('F');
}

// By day
function postsByDay($el) {
  return $el->date('j');
}

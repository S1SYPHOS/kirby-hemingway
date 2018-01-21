          <?php e(!$page->isHomePage(), '</div><!-- /posts -->') ?>
        </div><!-- /content.left -->
        <?php
          $intended = $page->intendedTemplate();
          if ($intended !== 'full-width' && $intended !== 'no-sidebar') { snippet('sidebar'); }
        ?>
        <div class="clear"></div>
      </div><!-- /wrapper -->
      <div class="footer section large-padding bg-dark">
        <div class="footer-inner section-inner">
          <div class="column column-1 left">
            <div class="widgets">
              <div class="widget">
                <div class="widget-content">
                  <h3 class="widget-title">About <?= $site->title()->html() ?></h3>
                  <?= $site->description()->kt() ?>
                </div><!-- /widget-content -->
                <div class="clear"></div>
              </div><!-- /widget -->
            </div><!-- /widgets -->
          </div>
          <div class="column column-2 left">
            <div class="widgets">
              <div class="widget">
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
            </div><!-- /widgets -->
          </div>
          <div class="column column-3 left">
            <div class="widgets">
              <div class="widget">
                <div class="widget-content">
                  <h3 class="widget-title">Video widget</h3>
                  <iframe src="https://player.vimeo.com/video/71515335" width="676" height="380" frameborder="0" title="The Idioms Challenge" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" data-origwidth="676" data-origheight="380" style="width: 178px; height: 100.059px;"></iframe>
                </div><!-- /widget-content -->
                <div class="clear"></div>
              </div><!-- /widget -->
            </div><!-- /widgets -->
          </div>
          <div class="clear"></div>
        </div><!-- /footer-inner -->
      </div><!-- /footer -->

      <div class="credits section bg-dark no-padding">
        <div class="credits-inner section-inner">
          <p class="credits-left">
            <span>Copyright</span> &copy; <?= date('Y') ?> <a href="<?= $site->url() ?>" title="<?= $site->title()->html() ?>"><?= $site->title()->html() ?></a>
          </p>
          <p class="credits-right">
            <?php e($site->footer()->isNotEmpty(), $site->footer()->ktRaw() . ' &mdash;') ?> <a title="To the Top" class="tothetop">Up &uarr;</a>
          </p>
          <div class="clear"></div>
        </div><!-- /credits-inner -->
      </div><!-- /credits -->

    </div><!-- /big-wrapper -->

    <!-- JS -->
    <?= js(array(
      'assets/jquery.js',
      'assets/jquery-migrate.min.js',
      'assets/global.js'
    )) ?>

  </body>
</html>

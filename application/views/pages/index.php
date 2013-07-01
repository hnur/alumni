<section id="main-content">

      <!-- Slider Wrapper -->
      <div class="slider-wrap slider-wrap-no-margin">
        <div class="container">
          <div class="sixteen columns">
            <div class="slider-box">
              <div class="nivoslider" style="height:170px;">
                <img src="<?php echo base_url('assets/image/banner-mf.jpg'); ?>" alt="" style="height: auto;">
                <img src="<?php echo base_url('assets/image/banner-mf.jpg'); ?>" alt="" style="height: auto;">
                <img src="<?php echo base_url('assets/image/banner-mf.jpg'); ?>" alt="" style="height: auto;">
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- END Slider Wrapper -->

      <!-- Headline Widget -->
      <div class="headline">
        <div class="container">
          <div class="sixteen columns">
            Omü de öğrenci olmak <span class="underline">yetti</span>, Bundan böyle <span class="underline">mezun olarak</span> bu portalda  birlikte olmak dileğiyle
          </div>
        </div>
      </div>
      <!-- END Headline Widget -->

      <div class="container">

        <!-- Latest Posts Widget -->
        <div class="sixteen columns">
          <div class="underline-heading">
            <h2>Duyurular</h2>
          </div>

          <div class="row latest-blog">
            <? foreach ($notice as $kNotice => $vNotice) { ?>
            <!-- Modal -->
              <div id="<? echo $vNotice['id']; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h3 id="myModalLabel"><? echo $vNotice['subject']; ?></h3>
                </div>
                <div class="modal-body">
                  <? echo $vNotice['content']; ?>
                </div>
                <div class="modal-footer">
                  <button id="sozlesmeoku" class="btn btn-success" data-dismiss="modal" aria-hidden="true">Tamam</button>
                </div>
              </div>
            <!-- End Modal -->
            <!-- Post Entry -->
            <div class="one-third column alpha">
              <div class="media image">
                <a href="<?php echo site_url('home/user?message=0&userid='.$vNotice['users_id']); ?>">
                  <?php if(file_exists('./assets/profile_images/'.$vNotice['users_id'].'.png')): ?>
                    <img style="height: 100px !important;" src="<?php echo base_url('assets/profile_images/'.$vNotice['users_id'].'.png'); ?>" alt="" />
                  <?php else: ?>
                    <img style="height: 100px !important;" src="<?php echo base_url('assets/image/avatar.jpg'); ?>" alt="" />
                  <?php endif; ?>
                </a>
                <div class="overlay">
                  <div class="post-type">
                    <i class="icon-picture"></a></i>
                  </div>
                  <div class="date">
                    <?php
                      $date = date_create($vNotice['publish_date']);
                     ?>
                    <span class="day"><?php echo date_format($date, 'd'); ?></span>
                    <span class="month"><?php echo date_format($date, 'M'); ?></span>
                  </div>
                </div>
              </div>
              <h3><a href="blog-single.html"><?php echo $vNotice['subject'] ?></a></h3>
              <p><?php echo substr($vNotice['content'],0,200).'...'; ?></p>
              <a href="#<? echo $vNotice['id']; ?>" role="button" class="btn btn-info" data-toggle="modal">Devamı</a>
            </div>
            <!-- END Post Entry -->
            <? } ?>
          </div>
        </div>
        <!-- END Latest Posts Widget -->

      </div>

    </section>
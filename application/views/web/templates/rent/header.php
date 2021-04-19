<!-- Header -->
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0"><?=$title?></h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <?php
                foreach ($breadcrumbs as $breadcrumb) {
                  $url = site_url($breadcrumb[1]);
                  if ($breadcrumb[1] == NULL || $breadcrumb[1] == '#') $url = $breadcrumb[1];

                  $aria_current = NULL;
                  if ($url != NULL) {
                    $breadcrumb_content = "<a href=\"{$url}\">{$breadcrumb[0]}</a>";
                  }
                  else {
                    $breadcrumb_content = $breadcrumb[0];
                    $aria_current = 'aria-current="page"';
                  }

                  ?><li class="breadcrumb-item" <?=$aria_current?>><?=$breadcrumb_content?></li><?php
                }
              ?>
            </ol>
          </nav>
        </div>
        <?php if (isset($buttons) && $buttons) { ?>
          <div class="col-lg-6 col-5 text-right">
            <?php
              foreach ($buttons as $button) {
                $url = site_url($button[2]);
                if ($button[2] == NULL || $button[2] == '#') $url = '#';
                $color_class = $button[1] ? $button[1] : 'default';
                ?><a href="<?=$url?>" id="edit-item-button" class="btn btn-sm btn-<?=$color_class?>"><?=$button[0]?></a><?php
              }
            ?>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

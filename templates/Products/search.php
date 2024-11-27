  <style>
      .product-img {
          height: 160px !important;
      }

      .ltn__product-item-3 .product-info {
          height: 150px !important;
      }
  </style>
  <!-- PRODUCT DETAILS AREA START -->
  <div class="ltn__product-area ltn__product-gutter mb-120">
      <div class="container">
          <div class="row">
              <div class="col-lg-9 order-lg-2 pt-20">
                  <?= count($products) > 0 ? $this->element('website/pages/search/get_result') : $this->element('website/pages/search/no_result') ?>
              </div>
              <div class="col-lg-3  mb-120">
                  <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar pt-20">
                      <!-- Category Widget -->
                      <div class="widget ltn__menu-widget">
                          <h2>الأقسام</h2>
                          <?php foreach ($getCatsAnsSubCats as $k => $v) {    ?>
                              <h4 id="accordion_<?= $v["id"] ?>" class="ltn__widget-title ltn__widget-title-border mb-0" data-bs-toggle="collapse" data-bs-target="#cat-<?= $v["id"] ?>"><?= $v["name"] ?> </h4>
                              <ul id="cat-<?= $v["id"] ?>" class="collapse" data-bs-parent="#accordion_<?= $v["id"] ?>">
                                  <?php foreach ($v["inner_categories"] as $subK => $subV) {   ?>
                                      <li>
                                          <a href="<?= URL . 'products/search?subCat=' . $subV["id"] ?>"><?= $subV["name"] ?></a>
                                      </li>
                                  <?php } ?>
                              </ul> <br>
                          <?php } ?>
                      </div>
                  </aside>
              </div>
          </div>
      </div>
  </div>
  <!-- PRODUCT DETAILS AREA END -->




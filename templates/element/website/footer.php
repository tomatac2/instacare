

    <!-- FOOTER AREA START -->
    <footer class="ltn__footer-area  ">
        <div class="footer-top-area  section-bg-2 plr--5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-5 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget footer-about-widget">
                            <div class="footer-logo">
                                <div class="site-logo">
                                    <img src="<?= $this->Url->build('/') ?>assets/img/logo.png" alt="Logo" style="width: 150px;">
                                </div>
                            </div>
                            <p>

نحن نهتم بك وبعائلتك
من خلال موقع انستاكير يمكنك طلب جميع احتياجاتك واحتياجات عائلتك من الصيدلية في أي وقت وفي أي مكان ، كما يمكنك طلب الدعم من الصيادلة المتخصصين على مدار 24 ساعة في اليوم.
                            </p>
                            <!-- <div class="footer-address">
                                <ul>
                                    <li>
                                        <div class="footer-address-icon">
                                            <i class="icon-placeholder"></i>
                                        </div>
                                        <div class="footer-address-info">
                                            <p>رقم التسجيل الضريبى : 332-2322-1233</p>
                                        </div>
                                    </li>
                                </ul>
                            </div> -->
                            <!-- <div class="ltn__social-media mt-20">
                                <ul>
                                    <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                                    <li><a href="#" title="Youtube"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget footer-menu-widget clearfix">
                            <h4 class="footer-title">المزيد عنا</h4>
                            <div class="footer-menu">
                                <ul>
                                    <li><a href="<?=URL.'عن-انستاكير'?>">عن انستاكير</a></li>
                                    <li><a href="<?=URL.'تواصل-معنا'?>">تواصل معنا</a></li>
                                    <li><a href="<?=URL. 'انضم-إلينا' ?>">هل تملك صيدلية ؟</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget footer-menu-widget clearfix">
                            <h4 class="footer-title">خدمتنا</h4>
                            <div class="footer-menu">
                                <ul>
                                    <li><a href="<?=URL.'products/search'?>">انستاكير اونلاين</a></li>
                                    <li><a href="<?=URL.'إرسال-روشتة'?>">إرسال روشتة</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ltn__copyright-area ltn__copyright-2 section-bg-7  plr--5">
            <div class="container-fluid ltn__border-top-2">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="ltn__copyright-design clearfix">
                            <p>جميع الحقوق محفوظة @ <span class="current-year"></span>  انستاكير  </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 align-self-center">
                        <div class="ltn__copyright-menu text-end">
                            <ul>
                                <li><a href="<?=URL.'كيفية-الاستخدام'?>">كيفية الاستخدام</a></li>
                                <li><a href="<?=URL?>سياسة-الخصوصية">سياسة الخصوصية</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!------GIFT POINTS----->
    <?= $this->element('website/pages/home/gift_points') ?>
    <!-----END GIFT POINTS------>
    </footer>
    <!-- FOOTER AREA END -->





</div>
<!-- Body main wrapper end -->

    <!-- preloader area start -->
    <div class="preloader d-none" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
    </div>
    <!-- preloader area end -->

    <!-- All JS Plugins -->
    <script src="<?= $this->Url->build('/') ?>assets/js/plugins.js"></script>
    <!-- Main JS -->
    <script src="<?= $this->Url->build('/') ?>assets/js/main.js"></script>
  
</body>
</html>


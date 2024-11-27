

<style>
  .error-message {
    color: red;
    font-size: 10px;
    padding-right: 10px;
    padding-bottom: 10px;

  }

  .form-control {
    margin-bottom: 10px !important;
  }

  /* @media (max-width: 1199px) {
   
} */
  .product-title {
    font-weight: 400 !important;
  }

  .ltn__main-menu>ul>li>a {
    padding: 16px 0px;
  }

  .warring_note {
    border-radius: 5px;
    width: 75%;
    margin-right: 12.5%;
    padding: 10px;
    text-align: center;
    font-weight: 900;
    font-size: 20px;
    border: 1px solid #66ef24b0;
    background: #e0f4ef;
    color: black;
  }

  .section-title {
    text-align: right;
    font-size: 28px !important;
  }

  .product-img {
    height: 290px;
  }

  .ltn__category-item ltn__category-item-6 text-center {
    padding: 10px;
  }

  .section-title-area {
    margin-bottom: 10px !important;
  }

  /***register page **/

  input {
    height: 45px !important;
    margin-bottom: 15px !important;
  }

  .ltn__tab-menu-list .nav a.active {
    background-color: #10ab81 !important;
  }

  .nice-select {
    text-align: right !important;
    color: #8cb2b2;
    height: 45px !important;
    line-height: unset !important;
    padding-top: 8px;
  }

  .current {
    font-weight: 100 !important;
  }

  .list>li {
    text-align: right !important;
  }



  .box {
    position: relative;
    background: #ffffff;
    width: 100%;
  }

  .box-header {
    color: #444;
    display: block;
    padding: 10px;
    position: relative;
    border-bottom: 1px solid #f4f4f4;
    margin-bottom: 10px;
  }

  .box-tools {
    position: absolute;
    right: 10px;
    top: 5px;
  }

  .dropzone-wrapper {
    border: 2px dashed #91b0b3;
    color: #92b0b3;
    position: relative;
    background: #0a9a7321 !important;
    height: 150px !important;
  }

  .dropzone-desc {
    position: absolute;
    margin: 0 auto;
    left: 0;
    right: 0;
    text-align: center;
    width: 40%;
    top: 50px;
    font-size: 16px;
  }

  .dropzone,
  .dropzone:focus {
    position: absolute;
    outline: none !important;
    width: 100%;
    height: 150px !important;
    cursor: pointer;
    opacity: 0;
  }

  .dropzone-wrapper:hover,
  .dropzone-wrapper.dragover {
    background: #ecf0f5;
  }

  .preview-zone {
    text-align: center;
  }

  .preview-zone .box {
    box-shadow: none;
    border-radius: 0;
    margin-bottom: 0;
  }

  /***order prescription  page **/
</style>



<!-- CONTACT MESSAGE AREA START -->

<div class="ltn__contact-message-area mb-120 mt-50">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="ltn__form-box contact-form-box box-shadow white-bg">
          <h4 class="title-2"> هل تملك صيدلية ؟ </h4>
          <div class="row" style="direction: rtl;">


            <div class="col-md-4">
              <div class="ltn__form-box contact-form-box box-shadow white-bg" style="padding: 15px !important;">
                <div class="row">
                  <p>
                    ان موقع انستاكير يوفر للعميل إمكانية طلب كافة احتياجاته من الصيدلية سواء أدوية أو منتجات غير دوائية أونلاين ليقوم موقع انستاكير بأخذ الطلب وإرساله إلى الصيدلية ليتم تحضير الطلب ثم توصيله بعد ذلك إلى عنوان العميل.

                  </p>

                  <p>
                    الآن مع موقع انستاكير يمكنك زيادة عدد عملاء صيدليتك وبالتالى زيادة مبيعاتك ،فقط قم بتسجيل صيدليتك مع موقع انستاكير واجعل طلب الأدوية والمنتجات غير الدوائية من صيدليتك اونلاين
                  </p>

                  <p>
                    لمعرفة المزيد من التفاصيل تواصل معنا عبر ملء بياناتك.
                  </p>
                </div>

              </div>
            </div>

            <div class="col-md-8   box-shadow white-bg " style="padding: 20px;">
              <?= $this->Form->create($joinUs, ['type' => 'file']) ?>
              <div class="row">

                <div class="col-md-6">
                  <label for=""> اسم الصيديلة</label>
                  <div class="input-item input-item-name">
                    <?= $this->Form->control('pharmacy_name', ['label' => false, 'class' => 'form-control radius-8', 'required' => false,  "placeholder" => "اسم الصيدلية", 'error' => ['class' => 'text-danger']]) ?>
                  </div>
                </div>

                <div class="col-md-6">
                  <label for=""> تليفون الصيديلة</label>
                  <div class="input-item input-item-name">
                    <?= $this->Form->control('pharmacy_phone', ['label' => false, 'class' => 'form-control radius-8', 'required' => false,  "placeholder" => "تليفون الصيدلية", 'error' => ['class' => 'text-danger']]) ?>
                  </div>
                </div>

                <div class="col-md-6">
                  <label for=""> مواعيد الصيديلة</label>
                  <div class="input-item input-item-name">
                    <?= $this->Form->control('pharmacy_times', ['label' => false, 'class' => 'form-control radius-8', 'required' => false,  "placeholder" => "مواعيد الصيدلية", 'error' => ['class' => 'text-danger']]) ?>
                  </div>
                </div>

                <div class="col-md-6">
                  <label for=""> منطقة التوصيل</label>
                  <div class="input-item input-item-name">
                    <?= $this->Form->control('area', ['label' => false, 'class' => 'form-control radius-8', 'required' => false,  "placeholder" => "منطقة التوصيل", 'error' => ['class' => 'text-danger']]) ?>
                  </div>
                </div>

                <div class="col-md-6">
                  <label for=""> تليفون مدير الصيديلة</label>
                  <div class="input-item input-item-name">
                    <?= $this->Form->control('manger_phone', ['label' => false, 'class' => 'form-control radius-8', 'required' => false,  "placeholder" => "تليفون مدير الصيدلية", 'error' => ['class' => 'text-danger']]) ?>
                  </div>
                </div>

                <div class="col-md-6">
                  <label for=""> اسم مدير الصيديلة</label>
                  <div class="input-item input-item-name">
                    <?= $this->Form->control('manger_name', ['label' => false, 'class' => 'form-control radius-8', 'required' => false,  "placeholder" => "اسم مدير الصيدلية", 'error' => ['class' => 'text-danger']]) ?>
                  </div>
                </div>


              </div>

              <div class="col-md-12">
                <h3 style="      color: #0a9a73;  padding-right: 7px;">
                  بيانات الصيدلية الرسمية
                </h3>

                <div class="input-item input-item-email ">
                  <label for="">أرفع صورة السجل التجاري </label><br>
                  <!----------->
                  <section>
                    <div class="container">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <div class="preview-zone hidden">
                              <div class="box box-solid">
                                <div class="box-header with-border">
                                  <div class="box-tools pull-right">
                                    <!-- <button type="button" class="btn btn-danger btn-xs remove-preview">
                                                                    <i class="fa fa-times"></i> Reset This Form
                                                                  </button> -->
                                  </div>
                                </div>
                                <div class="box-body"></div>
                              </div>
                            </div>
                            <div class="dropzone-wrapper">
                              <div class="dropzone-desc">
                                <i class="glyphicon glyphicon-download-alt"></i>
                                <p>ارفع الملف هنا
                                  <br>
                                  <span style="font-size: 12px ; color: red;">الحجم الأقصي المسموح 2ميجابايت</span>
                                </p>
                              </div>
                              <?php echo  $this->Form->input('register_document2', ["type" => "file", 'label' => false, 'class' => 'dropzone',  "placeholder" => "ادخل الاسم", 'error' => ['class' => 'text-danger']]) ?>
                            </div>
                          </div>
                        </div>
                      </div>


                    </div>

                  </section>

                  <div class="input-item input-item-email ">
                    <br>
                    <label for="">أرفع صورة البطاقة الضريبية </label>
                    <!----------->
                    <section>
                      <div class="container">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <div class="preview-zone hidden">
                                <div class="box box-solid">
                                  <div class="box-header with-border">
                                    <div class="box-tools pull-right">
                                      <!-- <button type="button" class="btn btn-danger btn-xs remove-preview">
                                                                    <i class="fa fa-times"></i> Reset This Form
                                                                  </button> -->
                                    </div>
                                  </div>
                                  <div class="box-body"></div>
                                </div>
                              </div>
                              <div class="dropzone-wrapper">
                                <div class="dropzone-desc">
                                  <i class="glyphicon glyphicon-download-alt"></i>
                                  <p>ارفع الملف هنا
                                    <br>
                                    <span style="font-size: 12px ; color: red;">الحجم الأقصي المسموح 2ميجابايت</span>
                                  </p>
                                </div>
                                <?= $this->Form->input('tax_document2', ["type" => "file", 'label' => false, 'class' => 'dropzone form-control radius-8',  "placeholder" => "ادخل الاسم", 'error' => ['class' => 'text-danger']]) ?>
                              </div>
                            </div>
                          </div>
                        </div>


                      </div>
                    </section>
                    <div class="input-item input-item-email ">
                      <br>
                      <label for="">أرفع رخصة الصيدلية </label>
                      <!----------->
                      <section>
                        <div class="container">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <div class="preview-zone hidden">
                                  <div class="box box-solid">
                                    <div class="box-header with-border">
                                      <div class="box-tools pull-right">
                                        <!-- <button type="button" class="btn btn-danger btn-xs remove-preview">
                                                                    <i class="fa fa-times"></i> Reset This Form
                                                                  </button> -->
                                      </div>
                                    </div>
                                    <div class="box-body"></div>
                                  </div>
                                </div>
                                <div class="dropzone-wrapper">
                                  <div class="dropzone-desc">
                                    <i class="glyphicon glyphicon-download-alt"></i>
                                    <p>ارفع الملف هنا
                                      <br>
                                      <span style="font-size: 12px ; color: red;">الحجم الأقصي المسموح 2ميجابايت</span>
                                    </p>
                                  </div>
                                  <?= $this->Form->input('license_document2', ["type" => "file", 'label' => false, 'class' => 'dropzone form-control radius-8',  "placeholder" => "ادخل الاسم", 'error' => ['class' => 'text-danger']]) ?>
                                </div>
                              </div>
                            </div>
                          </div>


                        </div>
                      </section>


                      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                      <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
                      <script>
                        function readFile(input) {
                          if (input.files && input.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function(e) {

                              var htmlPreview =
                                '<img width="200" src="' + e.target.result + '" />' +
                                '<p>' + input.files[0].name + '</p>';

                              var wrapperZone = $(input).parent();
                              var previewZone = $(input).parent().parent().find('.preview-zone');
                              var boxZone = $(input).parent().parent().find('.preview-zone').find('.box').find('.box-body');


                              wrapperZone.removeClass('dragover');
                              previewZone.removeClass('hidden');
                              boxZone.empty();
                              boxZone.append(htmlPreview);
                            };

                            reader.readAsDataURL(input.files[0]);
                          }
                        }

                        function reset(e) {
                          e.wrap('<form>').closest('form').get(0).reset();
                          e.unwrap();
                        }

                        $(".dropzone").change(function() {
                          readFile(this);
                        });

                        $('.dropzone-wrapper').on('dragover', function(e) {
                          e.preventDefault();
                          e.stopPropagation();
                          $(this).addClass('dragover');
                        });

                        $('.dropzone-wrapper').on('dragleave', function(e) {
                          e.preventDefault();
                          e.stopPropagation();
                          $(this).removeClass('dragover');
                        });

                        $('.remove-preview').on('click', function() {
                          var boxZone = $(this).parents('.preview-zone').find('.box-body');
                          var previewZone = $(this).parents('.preview-zone');
                          var dropzone = $(this).parents('.form-group').find('.dropzone');
                          boxZone.empty();
                          previewZone.addClass('hidden');
                          reset(dropzone);
                        });
                      </script>
                      <!-- <script src="assets/app.js"></script> -->
                      <!----------->
                    </div>
                  </div>



                  <div class="row">

                    <div class="col-md-12 mt-20">
                      <button class="btn theme-btn-1 btn-effect-1 text-uppercase" style="width: 100%;" type="submit"> انضم الينا </button>
                    </div>
                  </div>
                </div>

                <?= $this->Form->end() ?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
    <!-- CONTACT MESSAGE AREA END -->
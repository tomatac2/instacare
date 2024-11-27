    <!-- CONTACT MESSAGE AREA START -->
    <?= $this->Flash->render() ?>
 
    <style>
                .nice-select {
            display: none;
        }
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


  .ltn__tab-menu-list .nav a.active {
    background-color: #10ab81 !important;
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

    <div class="ltn__contact-message-area mb-120 mt-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__form-box contact-form-box box-shadow white-bg">
                        <h4 class="title-2"> الروشتة </h4>
                        
                        <?= $this->Form->create($prescription["data"], ['type' => 'file' ,  "id"=>"contact-form" ,  "style"=>"direction: rtl;"]) ?>
                        <!-- <form id="contact-form" action="" method="post" style="direction: rtl;"> -->
                            <div class="row">

                                <div class="col-md-8">
                                    <div class="container pt-15">
                                        <h4>عنوان التوصيل </h4>
                                        <div class="row">
                                            <?php if ($addresses): ?>
                                                <div class="col-md-12">
                                                    <div>
                                                        <select name="address_id" id="select" style="    margin-bottom: 5px;">
                                                            <option value="">اختر عنوان التوصيل</option>
                                                            <?php foreach ($addresses as $val) { ?>
                                                                <option value="<?= $val["id"] ?>" <?= $prescription["data"]["address_id"] == $val["id"] ? "selected" : "" ?>><?= $val["full_address"] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                                <br>
                                                    <center><strong>أو</strong></center>
                                                    <br>
                                                    <textarea name="full_address" placeholder="أكتب العنوان بالتفصيل او اختر العنوان ...." name="" id="" style="min-height: 80px;"><?=$prescription["data"]["full_address"]?></textarea>
                                                </div>
                                            <?php
                                            else : echo '<textarea name="full_address" placeholder="أكتب العنوان بالتفصيل او اختر العنوان ...." name="" id="" style="min-height: 80px;"></textarea>';
                                            endif; ?>


                                        </div>
                                        <!-- <a href="#">+ اضف عنوان</a> -->
                                    </div>

                                    <div class="col-md-12">
                                        <div class="input-item input-item-email ">
                                            <label for="">أرفع صورة الروشتة</label><br>
                                            <!----------->
                                            <section>
                                                <div class="container input-item input-item-email">
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
                                                                    <?php echo  $this->Form->input('prescription_file2', ["type" => "file", 'label' => false, 'class' => 'dropzone',  "placeholder" => "ادخل الاسم", 'error' => ['class' => 'text-danger']]) ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>

                                            </section>


                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                    <br>
                                        <center><strong>أو</strong></center>
                                        <br>
                                        <h5>اكتب طلبك</h5>
                                        <div>اكتب هنا اسم الدواء او المنتج الذي تريد طلبه من الصيدلية</div>
                                        <div class="input-item input-item-email ">
                                            <textarea name="notes" id="" placeholder=" مثال : علبة بنادول ازرق و حفاضات مولفيكس مقاس 4 بانتس"><?=$prescription["data"]["notes"]?></textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="cart-coupon" bis_skin_checked="1">
                                            <div class="row" bis_skin_checked="1">
                                                <div class="col-lg-8 col-md-8 col-10" style="padding: 0 15px 0 0;" bis_skin_checked="1">
                                                    <input type="text" name="promo" value="" placeholder="ادخل كوبون الخصم هنا" style="width: 100% !important;">
                                                </div>

                                                <div class="col-lg-4 col-md-4 col-2" style="    padding-left: 0;padding-right: 0;" bis_skin_checked="1">
                                                    <button type="button" class="btn  btn-success " style="       background: #085641;   margin-left: 10px;  padding: 0 10px 0 9px;height: 65px;">تفعيل الكوبون</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-20">
                                            <button class="btn theme-btn-1 btn-effect-1 text-uppercase" style="width: 100%;" type="submit"> اتمام الطلب </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="ltn__form-box contact-form-box box-shadow white-bg" style="padding: 15px !important;">
                                        <div class="row">
                                            <div class="col-lg-2 col-sm-2">
                                                <h4 style="background: #e0f4ef; width: 30px;    padding: 7px 12px 4px 6px;border-radius: 50%;color: #0a9a73;">1</h4>
                                            </div>
                                            <div class="col-lg-9 col-sm-9">
                                                <h3 style="      color: #0a9a73;  padding-right: 7px;">اختر العنوان</h3>
                                                <p>قم باختيار العنوان ال1ى تريد التوصيل الدواء او المنتج اليه</p>
                                            </div>
                                            <div class="col-lg-2 col-sm-2">
                                                <h4 style="background: #e0f4ef; width: 30px;    padding: 7px 12px 4px 6px;border-radius: 50%;color: #0a9a73;">2</h4>
                                            </div>
                                            <div class="col-lg-9 col-sm-9">
                                                <h3 style="      color: #0a9a73;  padding-right: 7px;"> ارفع الروشتة </h3>
                                                <p>
                                                    قم برفع صورة الروشتة او المنتج أو قم بكتابة طلبك يدوياً الذي تحتاجه من الصيدلية
                                                </p>
                                            </div>
                                            <div class="col-lg-2 col-sm-2">
                                                <h4 style="background: #e0f4ef; width: 30px;    padding: 7px 12px 4px 6px;border-radius: 50%;color: #0a9a73;">3</h4>
                                            </div>
                                            <div class="col-lg-9 col-sm-9">
                                                <h3 style="      color: #0a9a73;  padding-right: 7px;"> البحث</h3>
                                                <p>
                                                    يقوم موقع انستاكير بالبحث عن طلبك فى الصيدليات القريبة منك ثم يتم توصيل
                                                    طلبك حتي باب البيت
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                            </div>
                        <!-- </form> -->
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTACT MESSAGE AREA END -->



    
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
                                            <!----------->
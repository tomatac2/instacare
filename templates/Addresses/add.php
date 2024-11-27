    <!-- CONTACT MESSAGE AREA START -->
     
    <div class="ltn__contact-message-area mb-120 mt-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__form-box contact-form-box box-shadow white-bg">
                        <h4 class="title-2">  أضف عنوان جديد </h4>
                        <?= $this->Form->create($address,["style"=>"direction: rtl;","id"=>"contact-form"]) ?>
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <div class="input-item input-item-name">
                                            <label for="">نوع العنوان</label>
                                            <?php  echo $this->Form->control('address_type' , [ 'label'=>false , "required"=>false,"placeholder"=>"مثال : المنزل او العمل"]); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-item input-item-email ">
                                            <label for="">العنوان بالتفصيل</label>
                                            <?php  echo $this->Form->control('full_address' , [ 'label'=>false , "required"=>false,"placeholder"=>"مثال : 44ش -محمد احمد محمود متفرع من شارع الجيش - سيدي بشر - الدور الرابع - شقة 22"]); ?>
                                        </div>
                                    </div>
                                </div>
                          
                                <!-- <div class="col-md-4">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27628.49688738147!2d31.183459629018177!3d30.049418092716223!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14584131cac08c7d%3A0xbd00be7b9494a8f4!2sMohandessin%2C%20Giza%20Governorate!5e0!3m2!1sen!2seg!4v1728646543717!5m2!1sen!2seg" width="100%" height="175" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div> -->

                                <div class="col-md-12">
                                    <div class="input-item input-item-email ">
                                        <label for="">اسم الشارع</label>
                                        <?php  echo $this->Form->control('street_name' , [ 'label'=>false , "required"=>false,"placeholder"=>"رقم الشارع - الحي - المدينة "]); ?>

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="input-item input-item-email col-md-6 ">
                                            <label for=""> رقم المبني / فيلا</label>
                                            <?php  echo $this->Form->control('building_number' , [ 'label'=>false , "required"=>false,"placeholder"=>"مثال: عمارة رقم 7"]); ?>
                                        </div>
                                        
                                        <div class="input-item input-item-email col-md-6 ">
                                            <label for="">رقم الطابق</label>
                                            <?php  echo $this->Form->control('floor_number' , [ 'label'=>false , "required"=>false,"placeholder"=>"مثال: الدور رقم 7"]); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="input-item input-item-email ">
                                        <label for="">رقم الشقة</label>
                                        <?php  echo $this->Form->control('apartment_number' , [ 'label'=>false , "required"=>false,"placeholder"=>"مثال: شقة رقم 7"]); ?>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="input-item input-item-email ">
                                        <label for="">علامة مميزة</label>
                                        <?php  echo $this->Form->control('unique_mark' , [ 'label'=>false , "required"=>false,"placeholder"=>"مثال : بجوار مسجد الرحمن"]); ?>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn theme-btn-1 btn-effect-1 text-uppercase" style="width: 100%;" type="submit"> حفظ العنوان </button>
                                </div>

                            </div>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTACT MESSAGE AREA END -->


    <style>
        input[type="text"], input[type="email"], input[type="password"], input[type="submit"], textarea{
            margin-bottom: 5px;
        }
    </style>
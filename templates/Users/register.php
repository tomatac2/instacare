    <?= $this->Flash->render() ?>
   <!-- LOGIN AREA START (Register) -->
    <div class="ltn__login-area pb-110">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area text-center">
                        <h1 class="section-title"> <br>سجل حساب جديد </h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="account-login-inner">
                            <?= $this->Form->create($user, ['type' => 'file', "class"=>"ltn__form-box contact-form-box"]) ?>
                                <div class="mb-20">
                                    <label for="quantity" class="form-label fw-semibold text-primary-light text-sm mb-8"> الأسم <span class="text-danger-600">*</span></label>
                                        <?= $this->Form->control('name', [ "type"=>"text",'label'=>false,'class' => 'form-control radius-8' ,'required'=>false,  "placeholder"=>"ادخل الاسم", 'error' => ['class' => 'text-danger']  ]) ?>
                                </div>
                   
                                <div class="mb-20">
                                    <label for="quantity" class="form-label fw-semibold text-primary-light text-sm mb-8"> البريد الإلكتروني <span class="text-danger-600">*</span></label>
                                        <?= $this->Form->control('email', [ "type"=>"email",'label'=>false,'class' => 'form-control radius-8','required'=>false,  "placeholder"=>"ادخل البريد الإلكتروني ", 'error' => ['class' => 'text-danger']  ]) ?>
                                </div>
                   
                   
                                <div class="mb-20">
                                    <label for="quantity" class="form-label fw-semibold text-primary-light text-sm mb-8"> رقم الموبيل <span class="text-danger-600">*</span></label>
                                        <?= $this->Form->control('mobile', [ "type"=>"text",'label'=>false,'class' => 'form-control radius-8','required'=>false,  "placeholder"=>"ادخل رقم الموبيل ", 'error' => ['class' => 'text-danger']  ]) ?>
                                </div>
                   
                            
                                <div class="mb-20">
                                    <label for="quantity" class="form-label fw-semibold text-primary-light text-sm mb-8"> كلمة المرور <span class="text-danger-600">*</span></label>
                                        <?= $this->Form->control('password', [ "type"=>"password",'label'=>false,'class' => 'form-control radius-8','required'=>false,  "placeholder"=>"ادخل كلمة المرور ", 'error' => ['class' => 'text-danger']  ]) ?>
                                </div>
                   
                            
                                <div class="mb-20">
                                    <label for="quantity" class="form-label fw-semibold text-primary-light text-sm mb-8"> تأكيد كلمة المرور<span class="text-danger-600">*</span></label>
                                        <?= $this->Form->control('confirm_password', [ "type"=>"password",'label'=>false,'class' => 'form-control radius-8','required'=>false,  "placeholder"=>"ادخل تأكيد كلمة المرور", 'error' => ['class' => 'text-danger']  ]) ?>
                                </div>
                   
                                <div class="col-12"> 
   
                                    <label for="">  النوع</label>
                                    <br>
                                <div  style="float: right;  padding: 15px;">
                                    <div >ذكر</div>
                                    <input type="radio" name="gender" value="ذكر" <?=$this->request->getData("gender")=="ذكر"?"checked":""?>>
                                </div>
                                <div  style="float: right; padding: 15px;">
                                    <div for="">أنثي</div>
                                    <input type="radio" name="gender" placeholder="أنثي"  value="أنثي"  <?=$this->request->getData("gender")=="أنثي"?"checked":""?>>
                                </div>
                            </div>
                            <br><br><br><br>
                            <div class="btn-wrapper">
                                <button class="theme-btn-1 btn reverse-color btn-block" type="submit">انشاء حساب جديد</button>
                            </div>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- LOGIN AREA END -->

    <style>
        input[type="text"], input[type="email"], input[type="password"], input[type="submit"], textarea{
            margin-bottom: 0px !important;
        }
    </style>
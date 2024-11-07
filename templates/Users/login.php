    <!-- LOGIN AREA START -->
    <?= $this->Flash->render() ?>
    <div class="ltn__login-area pb-65">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area text-center">
                        <br>
                        <h1 class="section-title">تسجيل الدخول لحسابك</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="account-login-inner">
                    <?= $this->Form->create($user , ["class"=>"ltn__form-box contact-form-box"]) ?>
                        <form action="#" >
                            <input type="text" name="email" value="<?=$this->request->getData("email")?>" placeholder="إدخل بريد الإلكتروني*">
                            <input type="password" name="password"  value="<?=$this->request->getData("password")?>" placeholder="إدخل كلمة المرور*">
                            <div class="btn-wrapper mt-0">
                                <button class="theme-btn-1 btn btn-block" type="submit">سجل الآن</button>
                            </div>
                            <div class="go-to-btn mt-20">
                                <a href="<?=URL.'استعادة-كلمة-المرور'?>"><small>هل نسيت كلمة المرور ؟</small></a>
                            </div>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="account-create text-center pt-50">
                        <h4>ليس لديك حساب فى انستاكير ؟ </h4>
                        <p>
                            يمكنك تسجيل حساب جديد الآن 
                            </p>
                        <div class="btn-wrapper">
                            <a href="<?=URL.'تسجيل-عضوية'?>" class="theme-btn-1 btn black-btn">سجل حساب جديد</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- LOGIN AREA END -->
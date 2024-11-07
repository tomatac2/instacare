    <!-- LOGIN AREA START -->
    <?= $this->Flash->render() ?>
    <div class="ltn__login-area pb-65">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area text-center">
                        <br>
                        <h1 class="section-title">تغيير كلمة المرور</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="account-login-inner">
                    <?= $this->Form->create($user , ["class"=>"ltn__form-box contact-form-box"]) ?>
                        <form action="#" >
                            <input type="password" name="password" required  placeholder="إدخل كلمة المرور*">
                             <div class="btn-wrapper mt-0">
                                <button class="theme-btn-1 btn btn-block" type="submit">تأكيد</button>
                            </div>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- LOGIN AREA END -->
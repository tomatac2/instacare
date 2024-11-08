
<style>
    #logout {
        float: left;
        color: #ffffff;
        font-size: 14px;
        padding: 7px;
        border-radius: 5px;
        background: red;
        font-weight: 400;
    }
</style>
<h3>
    الملف الشخصي
    <a href="<?=URL.'users/logout'?>" id="logout"> تسجيل الخروج</a>
</h3>
<div class="ltn__myaccount-tab-content-inner">
    <div class="ltn__form-box">
        <form  method="post">
            <div class="row mb-50">
                <div class="col-md-6">
                    <label>الأسم :</label>
                    <input type="text" name="name" value="<?= $auth->name ?>">
                </div>
                <div class="col-md-6">
                    <label> البريد الإلكتروني:</label>
                    <input type="email" name="email" value="<?= $auth->email ?>">
                </div>
                <div class="col-md-6">
                    <label> رقم الموبيل:</label>
                    <input type="text" name="mobile" value="<?= $auth->mobile ?>">
                </div>
                <div class="col-md-6">
                    <label> النوع :</label>
                    <br>
                    <div style="float: right;  padding: 7px;">
                        <div style="float: right;padding-top: 7px;padding-left: 7px; ">ذكر</div>
                        <input <?= $auth->gender == "ذكر" ? "checked" : "" ?> type="radio" name="gender" value="ذكر" style="float: right; ">
                    </div>
                    <div style="float: right; padding: 7px;">
                        <div style="float: right;padding-top: 7px;padding-left: 7px;  ">أنثي</div>
                        <input type="radio" <?= $auth->gender == "أنثي" ? "checked" : "" ?> name="gender" placeholder="أنثي" style="float: right; ">
                    </div>
                </div>
                <div class="btn-wrapper">
                    <input type="hidden" name="formType" value="updateProfile">
                    <input type="hidden" name="_csrfToken" value="<?= $this->request->getAttribute('csrfToken');?>">
                    <button class="theme-btn-1 btn reverse-color btn-block" type="submit"> حفظ التغييرات</button>

                        
                    <button class="theme-btn-1 btn" data-bs-target="#change_password" data-bs-toggle="modal" style="    background: white; color: black;border: 1px solid #0a9a73;" type="button"> تغيير كلمة المرور</button>
                     <?=$this->element("website/pages/profile/changepassword")?>   
                </div>
            </div>

        </form>
    </div>
</div>
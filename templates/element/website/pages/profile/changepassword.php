
    <!-- MODAL AREA START (Add To Cart Modal) -->
 <form action="" method="post">
    <div class="ltn__modal-area ltn__add-to-cart-modal-area ">
        <div class="modal fade" id="change_password" style="z-index: 9999999999999999999;" tabindex="-1">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                         <div class="ltn__quick-view-modal-inner">
                             <div class="modal-product-item">
                                <div class="row">
                                    <div class="col-12">
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>كلمة المرور الجديدة:</label>
                                                    <input type="password" name="password">
                                                    <label>تأكيد كلمة المرور:</label>
                                                    <input type="password" name="cpassword">
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="btn-wrapper">
                                            <input type="hidden" value="changepassword" name="fromType2">
                                            <input type="hidden" name="_csrfToken" value="<?= $this->request->getAttribute('csrfToken');?>">
                                            <button type="submit" class="btn theme-btn-1 btn-effect-1 text-uppercase">حفظ</button>
                                        </div>
                                    </div>
                                </div>
                             </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
    <!-- MODAL AREA END -->
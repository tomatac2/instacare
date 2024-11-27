<div class="card h-100 p-0 radius-12" style="background: none !important;box-shadow:none">
    <div class="card-body p-24">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10">
                <div class="card border">
                    <div class="card-body">

                        <?= $this->Form->create($gift) ?>
                        <fieldset>
                            <legend><?= __(' إضافة منتج هدية') ?></legend>

                            <div class="mb-20">
                                <label for="product_id" class="form-label fw-semibold text-primary-light text-sm mb-8"> اسم المنتج <span class="text-danger-600">*</span></label>
                                <?= $this->Form->control('product_id', ['required' => false, 'options' => $products, 'label' => false, 'class' => 'form-select form-control radius-8',  "placeholder" => "ادخل الاسم", 'error' => ['class' => 'text-danger']]) ?>
                            </div>

                            <div class="mb-20">
                                <label for="product_id" class="form-label fw-semibold text-primary-light text-sm mb-8"> نقاط الهدايا <span class="text-danger-600">*</span></label>
                                <?= $this->Form->control('points', ["default"=>"",'required' => false, 'type' => 'number', 'label' => false, 'class' => ' form-control radius-8',  "placeholder" => "ادخل نقاط الهدايا", 'error' => ['class' => 'text-danger']]) ?>
                            </div>

                            <div class="mb-20">
                                <label for="product_id" class="form-label fw-semibold text-primary-light text-sm mb-8"> الوصف  <span class="text-danger-600">*</span></label>
                                <?= $this->Form->control('description', ['required' => false, 'type' => 'textarea', 'label' => false,'style'=>'min-height:200px', 'class' => ' form-control radius-8',  "placeholder" => "ادخل الوصف", 'error' => ['class' => 'text-danger']]) ?>
                            </div>


                        </fieldset>
                        <div class="d-flex align-items-center justify-content-center gap-3">
                            <button type="submit" style="width: 50%;" class="btn btn-primary border border-primary-600 text-md px-56 py-12 radius-8">
                                حفظ
                            </button>
                        </div>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
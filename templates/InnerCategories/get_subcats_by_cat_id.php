<div class="mb-20">
    <label for="inner_category_id" class="form-label fw-semibold text-primary-light text-sm mb-8">  التصنيف الفرعي  <span class="text-danger-600">*</span></label>
    <?= $this->Form->control('sub_cat_id', ['options' => $getSubCatsByCatId, 'empty' => true, 'label'=>false,'class' => 'form-select form-control radius-8',  "placeholder"=>"اختر التصنيف الفرعي ", 'error' => ['class' => 'text-danger']  ]) ?>
</div>
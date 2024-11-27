<div class="card h-100 p-0 radius-12" style="background: none !important;box-shadow:none">
            <div class="card-body p-24">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-10">
                        <div class="card border">
                            <div class="card-body">
                                <?= $this->Form->create($slider, ['type' => 'file']) ?>
                                  <legend><?= __(' إضافة سيلدير') ?></legend>
                                    <div class="mb-20">
                                        <label for="name" class="form-label fw-semibold text-primary-light text-sm mb-8"> أسم السيلدير  <span class="text-danger-600">*</span></label>
                                         <?= $this->Form->control('name', [ 'label'=>false,'class' => 'form-control radius-8',  "placeholder"=>"ادخل الاسم", 'error' => ['class' => 'text-danger']  ]) ?>
                                    </div>
                         
                                    <div class="mb-20">
                                        <label for="link" class="form-label fw-semibold text-primary-light text-sm mb-8"> اللينك  <span class="text-danger-600">*</span></label>
                                         <?= $this->Form->control('link', [ 'label'=>false,'class' => 'form-control radius-8',  "placeholder"=>"ادخل اللينك", 'error' => ['class' => 'text-danger']  ]) ?>
                                    </div>
                         
                                    <div class="mb-20">
                                        <label for="link" class="form-label fw-semibold text-primary-light text-sm mb-8"> نوع السيلدير  <span class="text-danger-600">*</span></label>
                                         <?= $this->Form->control('type', ['type'=>'select' ,"options"=>["رئيسي","فرعي"], 'label'=>false,'class' => 'form-select form-control radius-8',  'error' => ['class' => 'text-danger']  ]) ?>
                                    </div>
                                
                             
                                <div>
                                    <label for="photo" class="form-label fw-semibold text-primary-light text-sm mb-8">   صورة المنتج الرئيسية <span class="text-danger-600">*</span></label>
                                    <div class="upload-image-wrapper">
                                            <div  style="text-align: center;" class="uploaded-img d-none position-relative h-160-px w-100 border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50">
                                                <button type="button" class="uploaded-img__remove position-absolute top-0 end-0 z-1 text-2xxl line-height-1 me-8 mt-8 d-flex bg-danger-600 w-40-px h-40-px justify-content-center align-items-center rounded-circle">
                                                    <iconify-icon icon="radix-icons:cross-2" class="text-2xl text-white"></iconify-icon>
                                                </button>
                                                <img id="uploaded-img__preview" style="      object-fit: contain !important;  width: 150px !important;height: 125px !important;" class="w-100 h-100 object-fit-cover" src="<?= $this->Url->build('/').$slider["photo"] ?>" alt="image">
                                            </div>
                                            <label class="upload-file h-160-px w-100 border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50 bg-hover-neutral-200 d-flex align-items-center flex-column justify-content-center gap-1" for="upload-file">
                                                <iconify-icon icon="solar:camera-outline" class="text-xl text-secondary-light"></iconify-icon>
                                                <span class="fw-semibold text-secondary-light">رفع الصورة  </span>
                                                <?= $this->Form->control('image', ["type"=>"file", "style"=>"opacity: 0;","id"=>"upload-file",'label'=>false,'class' => 'form-control radius-8',  "placeholder"=>"ادخل الاسم", 'error' => ['class' => 'text-danger']  ]) ?>
                                            </label>
                                        </div>
                                    </div>
                         
                                    
                            <br>
                            
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

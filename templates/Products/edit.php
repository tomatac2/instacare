<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="card h-100 p-0 radius-12" style="background: none !important;box-shadow:none">
    <div class="card-body p-24">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-10">
                    <div class="card border">
                        <div class="card-body">
                                <?= $this->Form->create($product, ['type' => 'file', "enctype"=>"multipart/form-data"]) ?>
                                <fieldset>
                                    <legend><?= __(' تحديث المنتج') ?></legend>
                                    <div class="mb-20">
                                        <label for="name_ar" class="form-label fw-semibold text-primary-light text-sm mb-8"> أسم المنتج بالعربي  <span class="text-danger-600">*</span></label>
                                         <?= $this->Form->control('name_ar', [ 'label'=>false,'class' => 'form-control radius-8', 'required'=>false,  "placeholder"=>"ادخل اسم المنتج بالعربي", 'error' => ['class' => 'text-danger']  ]) ?>
                                    </div>
                                    <div class="mb-20">
                                        <label for="name_en" class="form-label fw-semibold text-primary-light text-sm mb-8"> أسم المنتج بالانجليزي  <span class="text-danger-600">*</span></label>
                                         <?= $this->Form->control('name_en', [ 'label'=>false,'class' => 'form-control radius-8','required'=>false,  "placeholder"=>"ادخل اسم المنتج بالانجليزي", 'error' => ['class' => 'text-danger']  ]) ?>
                                    </div>
                                    <div class="mb-20">
                                        <label for="category_id" class="form-label fw-semibold text-primary-light text-sm mb-8">  التصنيف الرئيسي  <span class="text-danger-600">*</span></label>
                                         <?= $this->Form->control('category_id', ['options' => $categories, 'empty' => true ,'required'=>false,"id"=>"catId", 'label'=>false,'class' => 'form-select form-control radius-8',  "placeholder"=>"اختر التصنيف الرئيسي ", 'error' => ['class' => 'text-danger']  ]) ?>
                                    </div>
                                    <!------get sub ats------>
                                    <div id="response">
                                        <div class="mb-20">
                                            <label for="sub_cat_id" class="form-label fw-semibold text-primary-light text-sm mb-8">  التصنيف الفرعي  <span class="text-danger-600">*</span></label>
                                            <?= $this->Form->control('sub_cat_id', [ "options"=>$innerCategories , "value"=>$product["inner_category_id"],'empty' => true, 'label'=>false,'class' => 'form-select form-control radius-8',  "placeholder"=>"اختر التصنيف الفرعي ", 'error' => ['class' => 'text-danger']  ]) ?>
                                        </div>   
                                    </div>
                                    <!------end get sub ats------>

                                    <div class="mb-20">
                                        <label for="brand_id" class="form-label fw-semibold text-primary-light text-sm mb-8">  العلامة التجارية  <span class="text-danger-600">*</span></label>
                                         <?= $this->Form->control('brand_id', ['options' => $brands, 'empty' => true,'required'=>false, 'label'=>false,'class' => 'form-select form-control radius-8',  "placeholder"=>"اختر العلامة التجارية ", 'error' => ['class' => 'text-danger']  ]) ?>
                                    </div>
                                    <div>
                                    <label for="photo" class="form-label fw-semibold text-primary-light text-sm mb-8">   صورة المنتج الرئيسية <span class="text-danger-600">*</span></label>
                                    <div class="upload-image-wrapper">
                                    <div style="text-align: center;" class="uploaded-img position-relative h-160-px w-100 border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50">
                                    <button type="button" class="uploaded-img__remove position-absolute top-0 end-0 z-1 text-2xxl line-height-1 me-8 mt-8 d-flex bg-danger-600 w-40-px h-40-px justify-content-center align-items-center rounded-circle">
                                                    <iconify-icon icon="radix-icons:cross-2" class="text-2xl text-white"></iconify-icon>
                                                </button>
                                                <img id="uploaded-img__preview" style="      object-fit: contain !important;  width: 150px !important;height: 125px !important;" class="w-100 h-100 object-fit-cover" src="<?= $this->Url->build('/').$product["photo"] ?>" alt="image">
                                            </div>
                                            <label class="upload-file h-160-px w-100 border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50 bg-hover-neutral-200 d-flex align-items-center flex-column justify-content-center gap-1" for="upload-file">
                                                <iconify-icon icon="solar:camera-outline" class="text-xl text-secondary-light"></iconify-icon>
                                                <span class="fw-semibold text-secondary-light">رفع الصورة  </span>
                                                <?= $this->Form->control('image', [ "multiple","type"=>"file", "style"=>"opacity: 0;","id"=>"upload-file",'label'=>false,'class' => 'form-control radius-8',  "placeholder"=>"ادخل الاسم", 'error' => ['class' => 'text-danger']  ]) ?>
                                            </label>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="mb-20">
                                        <label for="quantity" class="form-label fw-semibold text-primary-light text-sm mb-8"> أسم كمية المنتج المتاحة  <span class="text-danger-600">*</span></label>
                                         <?= $this->Form->control('quantity', [ "type"=>"number",'label'=>false,'class' => 'form-control radius-8',  "placeholder"=>"ادخل كمية المنتج المتاحة", 'error' => ['class' => 'text-danger']  ]) ?>
                                    </div>
                                    <div class="mb-20">
                                        <label for="price" class="form-label fw-semibold text-primary-light text-sm mb-8">  سعر المنتج   <span class="text-danger-600">*</span></label>
                                         <?= $this->Form->control('price', [ "type"=>"number",'label'=>false,'class' => 'form-control radius-8',  "placeholder"=>"ادخل سعر المنتج ", 'error' => ['class' => 'text-danger']  ]) ?>
                                    </div>
                                    <!-- <div class="mb-20">
                                        <label for="offer_price" class="form-label fw-semibold text-primary-light text-sm mb-8">  سعر مخفض   <span class="text-danger-600">*</span></label>
                                         <?= $this->Form->control('offer_price', [ "type"=>"number",'label'=>false,'class' => 'form-control radius-8',  "placeholder"=>"ادخل سعر مخفض ", 'error' => ['class' => 'text-danger']  ]) ?>
                                    </div> -->
                                    <div class="mb-20">
                                        <!-- <label for="offer_price" class="form-label fw-semibold text-primary-light text-sm mb-8">  <span class="text-danger-600">*</span></label> -->
                                         <?= $this->Form->control('description', [ 'id'=>'desc',"type"=>"hidden",'label'=>false,'class' => 'form-control radius-8',  "placeholder"=>"ادخل وصف المنتج ", 'error' => ['class' => 'text-danger']  ]) ?>
                                
                                    <!------------editor------>
                                    <div>
                                <label class="form-label fw-bold text-neutral-900 ">  وصف المنتج   <span class="text-danger-600">*</span>  </label>
                                <div class="border border-neutral-200 radius-8 overflow-hidden">
                                    <div class="height-200">
                                        <!-- Editor Toolbar Start -->
                                       <div id="toolbar-container">
                                           <span class="ql-formats">
                                           <select class="ql-font"></select>
                                           <select class="ql-size"></select>
                                           </span>
                                           <span class="ql-formats">
                                           <button class="ql-bold"></button>
                                           <button class="ql-italic"></button>
                                           <button class="ql-underline"></button>
                                           <button class="ql-strike"></button>
                                           </span>
                                           <span class="ql-formats">
                                           <select class="ql-color"></select>
                                           <select class="ql-background"></select>
                                           </span>
                                           <span class="ql-formats">
                                           <button class="ql-script" value="sub"></button>
                                           <button class="ql-script" value="super"></button>
                                           </span>
                                           <span class="ql-formats">
                                           <button class="ql-header" value="1"></button>
                                           <button class="ql-header" value="2"></button>
                                           <button class="ql-blockquote"></button>
                                           <button class="ql-code-block"></button>
                                           </span>
                                           <span class="ql-formats">
                                           <button class="ql-list" value="ordered"></button>
                                           <button class="ql-list" value="bullet"></button>
                                           <button class="ql-indent" value="-1"></button>
                                           <button class="ql-indent" value="+1"></button>
                                           </span>
                                           <span class="ql-formats">
                                           <button class="ql-direction" value="rtl"></button>
                                           <select class="ql-align"></select>
                                           </span>
                                           <span class="ql-formats">
                                           <button class="ql-link"></button>
                                           <button class="ql-image"></button>
                                           <button class="ql-video"></button>
                                           <button class="ql-formula"></button>
                                           </span>
                                           <span class="ql-formats">
                                           <button class="ql-clean"></button>
                                           </span>
                                       </div>
                                       <!-- Editor Toolbar Start -->
                                       <style>
                                        .ql-editor{text-align: right !important}   
                                       </style>
                                       <!-- Editor start -->
                                       <div id="editor">
                                          
                                                  <?=$product["description"]?>  

                                       </div>
                                       <!-- Edit End -->
                                    </div>
                                </div>
                            </div>
                                    <!------------end editor------>
                                    </div>
                                    <div class="mb-20">
                                  
                                        <div class="form-switch switch-primary d-flex align-items-center gap-3">
                                            <label for="offer_price" class="form-label fw-semibold text-primary-light text-sm mb-8">   منتج الأكثر بيعاً  </label>
                                            <input class="form-check-input" name="most_selling"  type="checkbox" role="switch" id="yes" <?=$product["most_selling"]=="yes"?"checked":"" ?> >
                                        </div>
                               </div>
                        
                               <!----------muliple photos ------------>
                               <div class="card-body p-24">
                                    <label for="offer_price" class="form-label fw-semibold text-primary-light text-sm mb-8">   صور المنتج  <span class="text-danger-600">*</span></label> 
                                    
                                    <div class="upload-image-wrapper d-flex align-items-center gap-3 flex-wrap">
                                        <div class="uploaded-imgs-container d-flex gap-3 flex-wrap"></div>
                                        <label class="upload-file-multiple h-120-px w-120-px border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50 bg-hover-neutral-200 d-flex align-items-center flex-column justify-content-center gap-1" for="upload-file-multiple">
                                        <iconify-icon icon="solar:camera-outline" class="text-xl text-secondary-light"></iconify-icon>
                                        <span class="fw-semibold text-secondary-light">ارفع صور المنتج</span>
                                        <input id="upload-file-multiple" name="images[]" type="file" hidden="" multiple="">
                                        </label>
                                    </div>
                                </div>
                               <!----------end muliple photos ------------>
                               
                               <div class="d-flex align-items-center justify-content-center gap-3">
                                    <button type="submit" style="width: 50%;" class="btn btn-primary border border-primary-600 text-md px-56 py-12 radius-8"> 
                                        حفظ
                                    </button>
                               </div>
                               <?= $this->Form->end() ?>
       <!----------old photos ------------>
       <div class="related">
                    <h4><?= __('صور المنتج') ?></h4>
                    <?php if (!empty($product->product_images)) : ?>
                    <div class="table-responsive">
                        <table id="imgs">
                            <?php foreach ($product->product_images as $productImage) : ?>
                            <tr>
                                <td><img src="<?= $this->Url->build('/').$productImage->photo ?>" style="width:150px ;height:100px"></td>
                                <td class="actions">
                                    <div class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                        <?= $this->Form->postLink('<iconify-icon icon="mingcute:delete-2-line"> </iconify-icon>',
                                            ['controller'=>"ProductImages",'action' => 'delete', $productImage->id],
                                            ['confirm' => __('سيتم حذف الصورة ') , 'escape' => false, ]) 
                                        ?>
                                    </div>

                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                        <style>
                        .table-responsive>table>tbody>td, .table-responsive>table>tbody>th, .table-responsive>table>tbody>tr{ margin: 10px; display: inline-block !important; ;}
                        </style>
                    </div>
                    <?php endif; ?>
                </div>
                <!----------end old photos ------------>

                                </fieldset>
 
    
                          
                      </div>
                    </div>
                </div>
            </div>
    </div>
</div>


<script>
    $(function(){
        $('.ql-editor').attr('data-placeholder','اكتب وصف المنتج');
        $('.ql-editor').keyup(function(){
            $("#desc").val($('.ql-editor').html());
        })
        //$("data-placeholder").attr("").val("1");
        $("#catId").change(function(){
            var catID = $("#catId").val();

                $.ajax({
                        url: '<?=$this->Url->build('/')?>inner-categories/get-subcats-by-cat-id/'+catID,
                        type: 'GET',
                        cache: false,
                        headers: {
                            'X-CSRF-Token': "<?=$this->request->getAttribute('csrfToken')?>" 
                            },
                        success: function(res){
                           // console.log(res);
                          
                            $("#response").html(res);
                            // $("#showMore").css("display","inline")
                            // $("#imgLoader").css("display","none");
                        }
                });
            })
            })
             
     
        </script>
 
            <script>
                  // ================================================ Upload Multiple image js Start here ================================================
  const fileInputMultiple = document.getElementById("upload-file-multiple");
  const uploadedImgsContainer = document.querySelector(".uploaded-imgs-container");

  fileInputMultiple.addEventListener("change", (e) => {
    const files = e.target.files;

    Array.from(files).forEach(file => {
      const src = URL.createObjectURL(file);

      const imgContainer = document.createElement('div');
      imgContainer.classList.add('position-relative', 'h-120-px', 'w-120-px', 'border', 'input-form-light', 'radius-8', 'overflow-hidden', 'border-dashed', 'bg-neutral-50');

      const removeButton = document.createElement('button');
      removeButton.type = 'button';
      removeButton.classList.add('uploaded-img__remove', 'position-absolute', 'top-0', 'end-0', 'z-1', 'text-2xxl', 'line-height-1', 'me-8', 'mt-8', 'd-flex');
      removeButton.innerHTML = '<iconify-icon icon="radix-icons:cross-2" class="text-xl text-danger-600"></iconify-icon>';

      const imagePreview = document.createElement('img');
      imagePreview.classList.add('w-100', 'h-100', 'object-fit-cover');
      imagePreview.src = src;

      imgContainer.appendChild(removeButton);
      imgContainer.appendChild(imagePreview);
      uploadedImgsContainer.appendChild(imgContainer);

      removeButton.addEventListener('click', () => {
        URL.revokeObjectURL(src);
        imgContainer.remove();
      });
    });

    // Clear the file input so the same file(s) can be uploaded again if needed
    //fileInputMultiple.value = '';
  });
  // ================================================ Upload Multiple image js End here  ================================================
            </script>
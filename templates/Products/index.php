<style>
    .showOnHome{
        background: #ddd;
    padding: 15px;
    width: 75%;
    margin-right: 12.5%;
    margin-top: 10px;
    margin-bottom: 10px;
    }
</style>
<div class="categories index content card basic-data-table">
    <h3><?= __('قائمة المنتجات') ?></h3>
    <div class="table-responsive card-body">
        <table class="table bordered-table mb-0 dataTable">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('الإسم ') ?></th>
                    <th><?= $this->Paginator->sort('التصنيف الرئيسي') ?></th>
                    <th><?= $this->Paginator->sort('التصنيف الفرعي') ?></th>
                    <th><?= $this->Paginator->sort('الصورة الرئيسية') ?></th>
                    <th><?= $this->Paginator->sort('الكمية') ?></th>
                    <th><?= $this->Paginator->sort('سعر المنتج') ?></th>
                    <th class="actions"><?= __('الخصائص') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= h($product->name_ar) ?></td>
                    <td><?= h($product->category->name) ?></td>
                    <td><?= h($product->inner_category->name) ?></td>
                    <td><img src="<?= $this->Url->build('/').$product->photo ?>" width="150" height="100"></td>
                    <td><?= $product->quantity ?></td>
                    <td><?= $product->price ?></td>
                    <td class="actions">

                        <a href="<?=$this->Url->build('/').'products/view/'.$product->id?>" class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                        <iconify-icon icon="lucide:eye"></iconify-icon>
                        </a>

                        <a href="<?=$this->Url->build('/').'products/edit/'.$product->id?>" class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                        <iconify-icon icon="lucide:edit"></iconify-icon>
                        </a>

                        <div class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                            <?= $this->Form->postLink('<iconify-icon icon="mingcute:delete-2-line"> </iconify-icon>',
                                ['action' => 'delete', $product->id],
                                ['confirm' => __('سيتم حذف '.$product["name_ar"]) , 'escape' => false, ]) 
                            ?>
                        </div>
                          

                        <div class="showOnHome">
                            <div class="mb-20 mt-20">
                                <label for="category_id" class="form-label fw-semibold text-primary-light text-sm mb-8">  عرض في الرئيسية  <span class="text-danger-600">*</span></label>
                                <?= $this->Form->control('sections', ['options' => $sections , "value"=>$product["show_on_home"], 'empty' => true ,'required'=>false,"id"=>"catId", 'label'=>false,'class' => 'getSection_'.$product["id"].' form-select form-control radius-8',  "placeholder"=>"اختر التصنيف الرئيسي ", 'error' => ['class' => 'text-danger']  ]) ?>
                        
                        
                            </div>

                            <button type="submit" id="btn<?=$product["id"]?>" class="getSectionBtn btn btn-primary border border-primary-600 text-md px-56 py-12 radius-8"> 
                                عرض  
                                <input type="hidden" value="<?=$product["id"]?>" class="productID">
                            </button>
                        </div>

                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator dt-paging paging_full_numbers">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('أول')) ?>
            <?= $this->Paginator->prev('< ' . __('سابق')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('تالي') . ' >') ?>
            <?= $this->Paginator->last(__('أخير') . ' >>') ?>
        </ul>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(function(){
        $(".getSectionBtn").click(function(){
            var productID = $(this).find(".productID").val();
            var selectionID = $(".getSection_"+productID).val() ; 
            $("#btn"+productID).prop('disabled', true).text("تحميل ...");
            showProductOnHome(productID,selectionID);
       });


       function showProductOnHome(productID,selectionID){
        $.ajax({
                url: '/prodcuts/show-on-home?productID='+productID+'&selectionID='+selectionID,
                type: 'GET',
                cache: false,
                headers: {
                    'X-CSRF-Token': "<?= $this->request->getAttribute('csrfToken');?>" 
                    },
                success: function(res){
                    $("#btn"+productID).prop('disabled', false);
                    $("#response").html(res);
                    var response = JSON.parse(res) ; 
                    $("#btn"+productID).text(response.msg);
                }
                });
       }
      
    })
</script>
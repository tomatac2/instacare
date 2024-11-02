<style>
    td, th, tr {
    text-align: center !important;
    border: 1px solid #ddd;
    padding: 10px;
}
</style>
<div class="card h-100 p-0 radius-12" style="background: none !important;box-shadow:none">
<div class="card-body p-24">   
    <div class="row justify-content-center">
    <div class="col-xl-8 col-lg-10">
    <div class="card border">
        <div class="card-body">
            <h3>
            <?= h($product->name_ar) ?> 
            <div style="float: left;">
                 <a href="<?= $this->Url->build('/').'products/edit/'.$product->id?>" class="btn btn-primary border border-primary-600 text-md px-56 py-12 radius-8">تعديل المنتج</a>
            </div>
            </h3>
            <table  style="    width: 100%;">
                <tr>
                    <th><?= __('الاسم بالعربي') ?></th>
                    <td><?= h($product->name_ar) ?></td>
                </tr>
                <tr>
                <th><?= __('الاسم بالانجليزية') ?></th>
                <td><?= h($product->name_en) ?></td>
                </tr>
                <tr>
                    <th><?= __('التصنيف الرئيسي') ?></th>
                    <td><?=  $product->category->name ?></td>
                </tr>
                <tr>
                    <th><?= __('التصنيف الفرعي') ?></th>
                    <td><?=  $product->inner_category->name ?></td>
                </tr>
                <tr>
                    <th><?= __('العلامة التجارية') ?></th>
                    <td><?=  $product->brand->name ?></td>
                </tr>
                <tr>
                    <th><?= __('صورة المنتج الرئيسية') ?></th>
                    <td><img src="<?= $this->Url->build('/').$product->photo ?>" width="150" height="100"></td>
                </tr>
                <tr>
                    <th><?= __('اكثر مبيعاً') ?></th>
                    <td><?= $product->most_selling == "yes" ? "نعم": "لا" ?></td>
                </tr>
                <tr>
                    <th><?= __('الكمية فى المخزن') ?></th>
                    <td><?= $product->quantity === null ? '' : $this->Number->format($product->quantity) ?></td>
                </tr>
                <tr>
                    <th><?= __('السعر') ?></th>
                    <td><?= $product->price === null ? '' : $this->Number->format($product->price) ?></td>
                </tr>
                <tr>
                    <th><?= __('السعر الترويجي') ?></th>
                    <td><?= $product->offer_price === null ? '' : $this->Number->format($product->offer_price) ?></td>
                </tr>
                <tr>
                    <th><?= __('وصف المنتج') ?></th>
                    <td>
                        <blockquote>
                           <?=  $product->description; ?>
                        </blockquote>
                    </td>
                </tr>
            </table>
              
       
            <div class="related">
                <h4><?= __('صور المنتج') ?></h4>
                <?php if (!empty($product->product_images)) : ?>
                <div class="table-responsive">
                 
                    <table id="imgs">
                        <?php foreach ($product->product_images as $productImage) : ?>
                        <tr>
                            <td><img src="<?= $this->Url->build('/').$productImage->photo ?>" style="width:150px ;height:100px"></td>
                            <!-- <td class="actions">
                                <a href="<?=$this->Url->build('/').'productImages/edit/'.$productImage->id?>" class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="lucide:edit"></iconify-icon>
                                </a>

                                <div class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <?= $this->Form->postLink('<iconify-icon icon="mingcute:delete-2-line"> </iconify-icon>',
                                        ['controller'=>"ProductImages",'action' => 'delete', $productImage->id],
                                        ['confirm' => __('سيتم حذف الصورة ') , 'escape' => false, ]) 
                                    ?>
                                </div>

                             </td> -->
                        </tr>
                        <?php endforeach; ?>
                    </table>

                    <style>
                    .table-responsive>table>tbody>td, .table-responsive>table>tbody>th, .table-responsive>table>tbody>tr{  display: inline-block !important; ;}
                    </style>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('المخزن') ?></h4>
                <?php if (!empty($product->store)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Product Id') ?></th>
                            <th><?= __('Quantity') ?></th>
                            <th><?= __('Purchase Date') ?></th>
                            <th><?= __('Notes') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($product->store as $store) : ?>
                        <tr>
                            <td><?= h($store->id) ?></td>
                            <td><?= h($store->product_id) ?></td>
                            <td><?= h($store->quantity) ?></td>
                            <td><?= h($store->purchase_date) ?></td>
                            <td><?= h($store->notes) ?></td>
                            <td><?= h($store->created) ?></td>
                            <td><?= h($store->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Store', 'action' => 'view', $store->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Store', 'action' => 'edit', $store->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Store', 'action' => 'delete', $store->id], ['confirm' => __('Are you sure you want to delete # {0}?', $store->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    </div>
</div>
    </div>
</div>
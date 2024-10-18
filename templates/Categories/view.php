<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Categories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Category'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="categories view content">
            <h3><?= h($category->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($category->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Photo') ?></th>
                    <td><?= h($category->photo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($category->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($category->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($category->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Inner Categories') ?></h4>
                <?php if (!empty($category->inner_categories)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Category Id') ?></th>
                            <th><?= __('Photo') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($category->inner_categories as $innerCategory) : ?>
                        <tr>
                            <td><?= h($innerCategory->id) ?></td>
                            <td><?= h($innerCategory->name) ?></td>
                            <td><?= h($innerCategory->category_id) ?></td>
                            <td><?= h($innerCategory->photo) ?></td>
                            <td><?= h($innerCategory->created) ?></td>
                            <td><?= h($innerCategory->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'InnerCategories', 'action' => 'view', $innerCategory->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'InnerCategories', 'action' => 'edit', $innerCategory->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'InnerCategories', 'action' => 'delete', $innerCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $innerCategory->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Products') ?></h4>
                <?php if (!empty($category->products)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name Ar') ?></th>
                            <th><?= __('Name En') ?></th>
                            <th><?= __('Category Id') ?></th>
                            <th><?= __('Inner Category Id') ?></th>
                            <th><?= __('Brand Id') ?></th>
                            <th><?= __('Photo') ?></th>
                            <th><?= __('Quantity') ?></th>
                            <th><?= __('Price') ?></th>
                            <th><?= __('Offer Price') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Most Selling') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($category->products as $product) : ?>
                        <tr>
                            <td><?= h($product->id) ?></td>
                            <td><?= h($product->name_ar) ?></td>
                            <td><?= h($product->name_en) ?></td>
                            <td><?= h($product->category_id) ?></td>
                            <td><?= h($product->inner_category_id) ?></td>
                            <td><?= h($product->brand_id) ?></td>
                            <td><?= h($product->photo) ?></td>
                            <td><?= h($product->quantity) ?></td>
                            <td><?= h($product->price) ?></td>
                            <td><?= h($product->offer_price) ?></td>
                            <td><?= h($product->description) ?></td>
                            <td><?= h($product->most_selling) ?></td>
                            <td><?= h($product->created) ?></td>
                            <td><?= h($product->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Products', 'action' => 'view', $product->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Products', 'action' => 'edit', $product->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Products', 'action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>
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
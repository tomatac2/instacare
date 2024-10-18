<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InnerCategory $innerCategory
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Inner Category'), ['action' => 'edit', $innerCategory->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Inner Category'), ['action' => 'delete', $innerCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $innerCategory->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Inner Categories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Inner Category'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="innerCategories view content">
            <h3><?= h($innerCategory->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($innerCategory->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Category') ?></th>
                    <td><?= $innerCategory->hasValue('category') ? $this->Html->link($innerCategory->category->name, ['controller' => 'Categories', 'action' => 'view', $innerCategory->category->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Photo') ?></th>
                    <td><?= h($innerCategory->photo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($innerCategory->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($innerCategory->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($innerCategory->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Products') ?></h4>
                <?php if (!empty($innerCategory->products)) : ?>
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
                        <?php foreach ($innerCategory->products as $product) : ?>
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
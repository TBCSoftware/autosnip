<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Forum[]|\Cake\Collection\CollectionInterface $forums
 */
?>
<div class="forums index content">
    <?= $this->Html->link(__('New Forum'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Forums') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('forum') ?></th>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($forums as $forum): ?>
                <tr>
                    <td><?= h($forum->forum) ?></td>
                    <td><?= $this->Number->format($forum->id) ?></td>
                    <td><?= h($forum->created) ?></td>
                    <td><?= h($forum->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $forum->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $forum->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $forum->id], ['confirm' => __('Are you sure you want to delete # {0}?', $forum->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Forum $forum
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Forum'), ['action' => 'edit', $forum->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Forum'), ['action' => 'delete', $forum->id], ['confirm' => __('Are you sure you want to delete # {0}?', $forum->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Forums'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Forum'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="forums view content">
            <h3><?= h($forum->forum) ?></h3>
            <table>
                <tr>
                    <th><?= __('Forum') ?></th>
                    <td><?= h($forum->forum) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($forum->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($forum->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($forum->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

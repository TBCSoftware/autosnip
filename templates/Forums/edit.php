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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $forum->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $forum->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Forums'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="forums form content">
            <?= $this->Form->create($forum) ?>
            <fieldset>
                <legend><?= __('Edit Forum') ?></legend>
                <?php
                    echo $this->Form->control('forum');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<!-- File: templates/Books/view.php -->
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
            <?= $this->Html->link(__('Edit Book'), ['action' => 'edit', $book->slug], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Book'), ['action' => 'delete', $book->slug], ['confirm' => __('Are you sure you want to delete # {0}?', $book->slug), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Books'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Book'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
	<div class="column-responsive column-80">
		
		<h1><?= h($book->title) ?></h1>
		<p><strong>Forum:</strong><span class="enh1"> <?= $book->forum_id ?> -- <?= $forum->forum ?> </span><strong>Finished?</strong><span class="enh1"> <?= (boolval($book->Finished) ? 'Yes' : 'No'); ?></span></p>
		<p><small><strong>Created: </strong><span class="enh2"><?= $book->created->format("d-M-y") ?> </span><strong>Last Posted:</strong><span class="enh2"> <?= $book->Lastpost->format("d-M-y") ?> </span><strong>Snips Posted Count: </strong><span class="enh2"><?= $book->LastSnip ?></span></small><br></p><br>
		<label for="booktext">Book Text</label>
		<textarea id="booktext" name="booktext" rows="10" cols="50" style="height:350px" disabled>
			<?= $book->BookText ?>
		</textarea>
	</div>
</div>
<!-- File: templates/Books/index.php -->

<div class="books index content">
	<h1>Books for Snippeting</h1>
	<?= $this->Html->link('Add Book to snip', ['action' => 'add'], ['class' => 'button float-right']) ?>
	<div class="table-responsive">
		<table>
			<thead>
				<tr>
					<th><?= $this->Paginator->sort('title') ?></th>
					<th><?= $this->Paginator->sort('LastSnip','NumPosted') ?></th>
					<th><?= $this->Paginator->sort('NextPost','Next Snip On') ?></th>
					<th><?= $this->Paginator->sort('created','Created') ?></th>
					<th>Finished?</th>		
				</tr>
			</thead>
			<tbody>
			<!-- Here is where we iterate through our $articles query object, printing out article info -->
				<?php foreach ($books as $book): ?>
				<tr>
					<td>
						<?= $book->title ?>
					</td>
					<td>
						<?= $book->LastSnip ?>
					</td>
					<td>
						<?= $book->NextPost->format("l, d-M-y") ?>
					</td>
					<td>
						<?= $book->created->format("d-M-y") ?>
					</td>
					<td>
						<?= (boolval($book->Finished) ? 'Yes' : 'No'); ?>
					</td>
					<td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $book->slug]) ?>
						<?= $this->Html->link('Edit', ['action' => 'edit', $book->slug]) ?>
						<?= $this->Form->postLink(
							'Delete',
							['action' => 'delete', $book->slug],
							['confirm' => 'Are you sure?'])
						?>
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
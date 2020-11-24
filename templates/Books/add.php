<!-- File: templates/Books/add.php -->

<h1>Add Book to Snip</h1>
<?php
    echo '<table><tr><td>';
	echo $this->Form->create($book);
    echo $this->Form->control('title');
	echo $this->Form->control('forums._id', ['options' => $forums, 'label' => 'Forum to Post In']);
	echo $this->Form->control('LastSnip');
	echo $this->Form->control('NextPost');
	echo '</td><td>';
	echo $this->Form->control('FinishAt');
	echo $this->Form->control('LowSize');
	echo $this->Form->control('HighSize');
	echo '</td></tr><tr><td colspan="2">';
	echo '<h4>Book Text</h4>';
	echo '<p>Please right-click and choose <strong>paste as plain text</strong>.</p>'; 
    echo $this->Form->textarea('BookText', ['style' => 'height: 300px']);
	echo '</td></tr></table>';
    echo $this->Form->button(__('Save Book'));
    echo $this->Form->end();
?>
<!-- File: templates/Books/edit.php -->

<h1>Edit Book to Snip </h1>
<?php
    echo '	<table>';
    echo '	<tr>';
    echo '		<td>';
			echo $this->Form->create($book);
			echo $this->Form->control('title');
			echo $this->Form->control('forums._id', ['options' => $forums, 'label' => 'Forum to Post In', 'value' => $book->forum_id]);
			echo $this->Form->control('LastSnip');
    echo '		</td>';
    echo '		<td>';
			echo $this->Form->control('NextPost');
			echo $this->Form->control('Lastpost');
			echo $this->Form->control('FinishAt');
    echo '		</td>';
    echo '		<td>';			
			echo $this->Form->control('Finished');
			echo $this->Form->control('LastCharPosted');
			echo $this->Form->control('LowSize');
			echo $this->Form->control('HighSize');
    echo '		</td>';
    echo '	</tr>';
    echo '	<tr>';
    echo '		<td colspan="3">';
			echo '<h4>Book Text</h4>';
			echo '<p>If you are editing / replacing this please right-click and choose <strong>paste as plain text</strong>. We don&apos;t want any html in this text. </p>'; 
			echo $this->Form->textarea('BookText', ['style' => 'height: 300px', 'rows' => '25', 'maxlength' => '5000000']);
    echo '		</td>';
    echo '	</tr>';
    echo '	</table>';
    echo $this->Form->button(__('Save Book'));
    echo $this->Form->end();
	
?>
	
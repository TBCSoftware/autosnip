<?php
// src/Model/Table/BooksTable.php
namespace App\Model\Table;

// initialization section where we load tools we need. 
use Cake\ORM\Table;
// the Text class
use Cake\Utility\Text;
// the EventInterface class
use Cake\Event\EventInterface;
// the Validator class
use Cake\Validation\Validator;

use Cake\Error\Debugger;

// This class provides the functions that do things with the books table 
// beyond what cake does by convention.
class BooksTable extends Table
{
    public function initialize(array $config): void
    {
        $this->addBehavior('Timestamp');
		$this->belongsTo('Forums');
    }
	
	public function beforeSave(EventInterface $event, $entity, $options)
	{
		//Make a slug if there isn't one. 
		if ($entity->isNew() && !$entity->slug) {
			$sluggedTitle = Text::slug($entity->title);
			// trim slug to maximum length defined in schema
			$entity->slug = substr($sluggedTitle, 0, 79);
		}
		
		//update the forum ID from the select forum id in the form. 
		$newforum = $entity->forums;
		$newID = $newforum['_id'];
		$entity->forum_id = $newID;
		
		// Make sure there are no links in the book text. 
		//$bookFromForm = $entity->BookText;
		//$cleanedText = Text::stripLinks($bookFromForm);
		//$entity->BookText = $cleanedText;
	}
	
	public function validationDefault(Validator $validator): Validator
	{
		$validator
			->notEmptyString('title')
			->minLength('title', 8)
			->maxLength('title', 80)

			->notEmptyString('forum')
			->minLength('forum', 8)
			->maxLength('forum', 80)
			
			->notEmptyString('BookText')
			->minLength('body', 500);

		return $validator;
	}
}
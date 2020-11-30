<?php
// src/Controller/BooksController.php

namespace App\Controller;

class BooksController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
    }
	
	public function index()
    {
		$books = $this->Paginator->paginate($this->Books->find()
			->where(['Books.Finished = 0'])
		);
        $this->set(compact('books'));
    }
	
	public function indexall()
    {
		$books = $this->Paginator->paginate($this->Books->find());
        $this->set(compact('books'));
	}
	
	public function view($slug = null)
	{
		$book = $this->Books->findBySlug($slug)->firstOrFail();
		
		//Try to get a forum name.... 
		$myforumid = $book->forum_id; 
		$forum = $this->Books->Forums->get($myforumid, [
            'contain' => [],
        ]);
		
		
		// Get a list of forums.
        //$forums = $this->Books->Forums->find('list')->all();

		//debug($forum);
		
		//pr($forums);

        // Set forums to the view context
        //$this->set('forums', $forums);
		$this->set(compact('forum'));
		$this->set(compact('book'));
	}
	public function add()
    {
        $book = $this->Books->newEmptyEntity();
        if ($this->request->is('post')) {
            $book = $this->Books->patchEntity($book, $this->request->getData());

            if ($this->Books->save($book)) {
                $this->Flash->success(__('Your book has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your book.'));
        }
		// Get a list of forums.
        $forums = $this->Books->Forums->find('list')->all();

        // Set forums to the view context
        $this->set('forums', $forums);
        $this->set('book', $book);
    }
	
	public function edit($slug)
	{
		$book = $this->Books
			->findBySlug($slug)
			->firstOrFail();

		if ($this->request->is(['post', 'put'])) {
			$this->Books->patchEntity($book, $this->request->getData());
			if ($this->Books->save($book)) {
				$this->Flash->success(__('Your book to snip has been updated.'));
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('Unable to update your book.'));
		}
		// Get a list of forums.
		$forums = $this->Books->Forums->find('list')->all();
		
        // Set forums to the view context
        $this->set('forums', $forums);
		$this->set('book', $book);
	}
	
	public function delete($slug)
	{
		$this->request->allowMethod(['post', 'delete']);

		$book = $this->Books->findBySlug($slug)->firstOrFail();
		if ($this->Books->delete($book)) {
			$this->Flash->success(__('The {0} book has been deleted.', $book->title));
			return $this->redirect(['action' => 'index']);
		}
	}
}
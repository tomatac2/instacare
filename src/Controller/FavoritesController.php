<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Favorites Controller
 *
 * @property \App\Model\Table\FavoritesTable $Favorites
 */
class FavoritesController extends AppController
{

    function addToFav(){
       $this->viewBuilder()->disableAutoLayout(false);
       $proID = $_GET["proID"] ; 
       $userID = $this->Authentication->getIdentity()->id ;

       $addToFav = $this->Favorites->addToFav(["product_id"=>$proID , "user_id"=>$userID]);
       $this->set(compact('addToFav'));
    }

    function favList(){
        $this->viewBuilder()->setLayout("website");
        $userID = $this->Authentication->getIdentity()->id ;
        $query = $this->Favorites->find()
            ->where(['Favorites.user_id'=>$userID])
            ->contain([
                'Products'=>function($q){return $q->select(['id','name_ar','photo','price']);},
                'Users'
            ]);
        $favorites = $this->paginate($query);
       // dd($favorites);
       $this->set(compact('favorites'));
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Favorites->find()
            ->contain(['Products', 'Users']);
        $favorites = $this->paginate($query);
        
        $this->set(compact('favorites'));
    }

    /**
     * View method
     *
     * @param string|null $id Favorite id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $favorite = $this->Favorites->get($id, contain: ['Products', 'Users']);
        $this->set(compact('favorite'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $favorite = $this->Favorites->newEmptyEntity();
        if ($this->request->is('post')) {
            $favorite = $this->Favorites->patchEntity($favorite, $this->request->getData());
            if ($this->Favorites->save($favorite)) {
                $this->Flash->success(__('The favorite has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The favorite could not be saved. Please, try again.'));
        }
        $products = $this->Favorites->Products->find('list', limit: 200)->all();
        $users = $this->Favorites->Users->find('list', limit: 200)->all();
        $this->set(compact('favorite', 'products', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Favorite id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $favorite = $this->Favorites->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $favorite = $this->Favorites->patchEntity($favorite, $this->request->getData());
            if ($this->Favorites->save($favorite)) {
                $this->Flash->success(__('The favorite has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The favorite could not be saved. Please, try again.'));
        }
        $products = $this->Favorites->Products->find('list', limit: 200)->all();
        $users = $this->Favorites->Users->find('list', limit: 200)->all();
        $this->set(compact('favorite', 'products', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Favorite id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $favorite = $this->Favorites->get($id);
        if ($this->Favorites->delete($favorite)) {
            $this->Flash->success(__('The favorite has been deleted.'));
        } else {
            $this->Flash->error(__('The favorite could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

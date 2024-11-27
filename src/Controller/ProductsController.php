<?php
declare(strict_types=1);

namespace App\Controller;
use App\Hellpers\UploadFile;
use Cake\ORM\TableRegistry;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 */
class ProductsController extends AppController
{

    function search(){
        $this->viewBuilder()->setLayout('website');

        $name = $_GET["name"];
        $cat = $_GET["cat"];
        $subCat = $_GET["subCat"];
        $showHome = $_GET["showHome"];
        $showHomeTitle = $_GET["showHomeTitle"];

        $getFilter =  $this->Products->searchByCatSubCatsName(["name"=>$name , "cat"=>$cat , "subCat"=>$subCat,"showHome"=>$showHome]) ;

        $products = $this->paginate($getFilter);

     
      //  echo json_encode($products[0]["inner_category"]["name"]);
      
    $qyeryFirst = $products->toArray()[0] ; 
    
    is_numeric($cat) && !is_numeric($subCat)  ? $title =  $qyeryFirst["category"]["name"] : "";
    is_numeric($subCat)  ? $title =  $qyeryFirst["inner_category"]["name"] : "";
    !empty($name)  ? $title =  $qyeryFirst["category"]["name"] : "";
    !empty($showHomeTitle)  ? $title =  $showHomeTitle : "";
   
    // echo $title ; exit; 
    $this->set(compact('products','title'));

    }


    function details($id){
        $this->viewBuilder()->setLayout('website');

        $userID = $this->Authentication->getIdentity()->id ;
        $userID ?$userID : $userID =  0 ; 
        $details = $this->Products->get(
            $id ,
            contain: [
                'ProductImages','Brands','Categories',
                'Favorites'=>function($q) use ($userID){
                    return $q ->where(['Favorites.user_id'=>$userID]);
                }
                ]
        );

       dd($details);
        $this->set(compact('details','userID'));

    }

 
    function showOnHome(){
        $this->viewBuilder()->disableAutoLayout(false);
        $productID = $_GET["productID"];
        $selectionID = $_GET["selectionID"];
        $updateProduct = $this->Products->showProductOnHome(["selectionID"=>$selectionID , "productID"=>$productID]);
        $this->set(compact('updateProduct'));
    }

    function home(){
        $this->viewBuilder()->setLayout('website');

        $slider5main2sub = TableRegistry::getTableLocator()->get('Sliders')->get5Main2Sub();

        dd($slider5main2sub);
        $mainCats = $this->Products->Categories->find()->limit(10)->toArray();
        
        //get products by section (vipHome = 1)
        $homeProducts =  $this->Products->getProductsBySectionId(1);

        // summber 
       # $summerProducts =  $this->Products->getProductsBySectionId(2);
      
        $winterProducts =  $this->Products->getProductsBySectionId(3);
        $face =  $this->Products->getProductsBySectionId(4);
        $womenTools =  $this->Products->getProductsBySectionId(5);
        $hair =  $this->Products->getProductsBySectionId(6);
        $milk =  $this->Products->getProductsBySectionId(7);
        $molifx =  $this->Products->getProductsBySectionId(8);
        $vitamins =  $this->Products->getProductsBySectionId(9);
        $sex =  $this->Products->getProductsBySectionId(10);

        $brands = TableRegistry::getTableLocator()->get('Brands')->find()->limit(20)->toArray();

        $this->set(compact('slider5main2sub','brands','mainCats','homeProducts','winterProducts','face','womenTools','hair','milk','molifx','vitamins','sex'));
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->viewBuilder()->setLayout("dashboard");
        $query = $this->Products->find()
            ->contain(['Categories', 'InnerCategories', 'Brands']);
        $products = $this->paginate($query);

        $sections = [
            1=>  "أدوية مهمة لكل بيت",
            2=>  "جاهز للصيف؟",
            3=> "جاهز للشتاء؟",
            4=>"أفضل منتجات البشرة",
            5=>"أفضل الفوط الصحية",
            6=>"أفضل منتجات الشعر",
            7=> "حليب الاطفال",
            8=> "حفاضات الاطفال",
            9=> "أفضل المكملات الغذائيه",
            10=> "أفضل منتجات الصحة الجنسية",
        ] ;

        $this->set(compact('products',"sections"));
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->setLayout("dashboard");        
        $product = $this->Products->get($id, contain: ['Categories', 'InnerCategories', 'Brands', 'Cart', 'Favorites', 'ProductImages', 'Store']);
        $this->set(compact('product'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {   
      
        $this->viewBuilder()->setLayout("dashboard");
        $product = $this->Products->newEmptyEntity();
        $req = $this->request->getData() ; 
     
        
        if ($this->request->is('post')) {
       //    dd($req["images"]);
           //dd($this->request->getData());
            $product = $this->Products->patchEntity($product, $req , ["validate"=>"addProduct"]);

            //upload file
            !$product->getErrors()   ? $uploadFile = UploadFile::uploadSinglePhoto(["photoName"=>"image" , "path"=>"library/products" ]) : "";  
            $product->photo = $uploadFile["name"]; 

            //most selling 
            $req["most_selling"] == "on" ? $product->most_selling = "yes" : $product->most_selling = "no";
            $product->inner_category_id  =  $req["sub_cat_id"]  ;

            if ($this->Products->save($product)) {
                //add quntity on store 
                $addToStore = $this->Products->Store->addToStore(["product_id"=>$product->id , "quantity"=>$req["quantity"] , "purchase_date"=> date("Y-m-d")]);
                
                //upload multi photo
                $multiPhotos = $this->multiPhotos(["imgs"=>$req["images"] , "product_id"=>$product["id"]]);


                $this->Flash->success(__('تم الحفظ بنجاح'));

                return $this->redirect(['action' => 'index']);
            }
        }
        $categories = $this->Products->Categories->find('list', limit: 200)->all();
        
        if($this->request->getData("category_id") && $this->request->getData("sub_cat_id")){
        
            $innerCategories = $this->Products->InnerCategories
                    ->find('list', limit: 200)
                    ->where(["category_id"=>$this->request->getData("category_id") ])    
                    ->all();
        }else{
            $innerCategories = $this->Products->InnerCategories->find('list', limit: 200)->all();
        }
        
        $brands = $this->Products->Brands->find('list', limit: 200)->all();
        $this->set(compact('product', 'categories', 'innerCategories', 'brands'));
    }

    //////////////
    function multiPhotos($obj){
      
        if($obj["imgs"]):
            $pImgsReg = TableRegistry::getTableLocator()->get('ProductImages');
            foreach($obj["imgs"] as $key=>$imgss){
                
                $uploadFiles = UploadFile::uploadMultiPhotos(["photoName"=>"images" , "path"=>"library/products" ],$key) ;
              
                if($uploadFiles["success"] == true){
                    $addImg = $pImgsReg->newEmptyEntity();
                    $addImg = $pImgsReg->patchEntity($addImg , ["photo"=> $uploadFiles["name"],"product_id"=>$obj["product_id"]]);
                    $pImgsReg->save($addImg);
                }
            }
             
        endif;
    }
    //////////////
    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout("dashboard");
        $req = $this->request->getData() ; 
       
        $product = $this->Products->get($id, contain: ['ProductImages']);
        $oldQuantity = $product["quantity"];

        if ($this->request->is(['patch', 'post', 'put'])) {
            
            $product = $this->Products->patchEntity($product,  $req , ["validate"=>"updateProduct"]);

            
            $oldImg = $product["photo"] ; 
            //upload file
            !$product->getErrors()  ? $uploadFile = UploadFile::uploadSinglePhoto(["photoName"=>"image" , "path"=>"library/products" ]) : "";  
            $uploadFile["code"] == 200 ?   $product->photo = $uploadFile["name"] 
                                        :  $product->photo = $oldImg ; 

            //most selling 
            $req["most_selling"] == "on" ? $product->most_selling = "yes" : $product->most_selling = "no";
            $product->inner_category_id  =  $req["sub_cat_id"]  ;

            if ($this->Products->save($product)) {

                //add quntity on store 
                $oldQuantity != $req["quantity"] = $this->Products->Store->updateQuantityProduct(["product_id"=>$product->id , "quantity"=>$req["quantity"],"type"=>"product"]);
                
                //upload multi photo
                $multiPhotos = $this->multiPhotos(["imgs"=>$req["images"] , "product_id"=>$product["id"]]);
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
        }
        $categories = $this->Products->Categories->find('list', limit: 200)->all();
        $innerCategories = $this->Products->InnerCategories->find('list', limit: 200)->all();
        $brands = $this->Products->Brands->find('list', limit: 200)->all();
        $this->set(compact('product', 'categories', 'innerCategories', 'brands'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Areas Controller
 *
 * @property \App\Model\Table\AreasTable $Areas
 */
class InstaCareController extends AppController
{
 
    function aboutInsta(){
        $this->viewBuilder()->setLayout("website");
    }

    function contactUs(){
        $this->viewBuilder()->setLayout("website");
    }

    function privacy(){
        $this->viewBuilder()->setLayout("website");
    }
    function howToUse(){
        $this->viewBuilder()->setLayout("website");
    }

  
}

<?php

namespace App\Presenters;

use Nette;
use App\Model;
use Nette\Application\UI\Form;


class AdministrationPresenter extends BasePresenter
{
  
    private $MenuManager;
    
    public function __construct(Model\MenuManager $m) {
	parent::__construct();
	$this->MenuManager = $m;
    }

    //vyhodi neadmina
    public function startup() {
	parent::startup();
	if(!$this->user->isInRole("admin"))
	{
	    $this->redirect("Homepage:default");
	}
    }


    protected function createComponentPridatKategoriiForm()
    {
	$form = new Form;
	$form->addText("name");
	$form->addText("upname");
	$form->addSubmit("submit");
	$form->onSuccess[] = function ($form,$values){
	if($this->MenuManager->addCategory($values["name"],$values["upname"]))
	{
	 $this->flashMessage("kategorie byla úspěšně vytvořena");   
	}
	else
	{
	    $this->flashMessage("kategorie s tímto názvem už existuje");
	}
	$this->redirect("Administration:default");
	};
	return $form;
    }
    
    protected function createComponentUpravitKategoriiForm()
    {
	$form = new Form;
	$form->addText("oldname");
	$form->addText("name");
	$form->addText("upname");
	$form->addSubmit("submit");
	$form->onSuccess[] = function ($form,$values){
	if($this->MenuManager->UpdateCategory($values["oldname"],$values["name"],$values["upname"]))
	{
	 $this->flashMessage("kategorie byla úspěšně vytvořena");   
	}
	else
	{
	    $this->flashMessage("kategorie s tímto názvem už existuje");
	}
	$this->redirect("Administration:default");
	};
	return $form;
    }
    
    protected function createComponentOdstranKategoriiForm()
    {
	$form = new Form;
	$form->addText("jmeno");
	$form->addSubmit("submit");
	$form->onSuccess[] = function($form,$values){
	    $this->MenuManager->removeCategory($values["jmeno"]);
	    $this->redirect("Administration:default");
	};
	return $form;
    }

}


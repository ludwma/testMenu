<?php

namespace App\Presenters;

use Nette;
use App\Model;
use Nette\Application\UI\Form;


/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{
 protected function createComponentLoginForm()
    {
	$form = new Form;
	$form->addText("jmeno");
	$form->addPassword("heslo");
	$form->addSubmit("odeslat");
	$form->onSuccess[] = function($form,$values){
	try {
                $this->user->login($values["jmeno"], $values["heslo"]);
		$this->redirect("Administration:default");
            } catch (Nette\Security\AuthenticationException $e) {
                $this->flashMessage("Špatné jméno nebo heslo , zkuste to znovu", "bleskNe");
            }    
	};
	return $form;
    }
    protected function createComponentLogOutForm()
    {
    $form = new Form;
    $form->addSubmit("odhlas");
    $form->onSuccess[] = function ($form,$values){
	$this->user->logout();
	$this->flashMessage("Odhlášení proběhlo úspěšně","blesk");
	$this->redirect("Homepage:default");
    };
	return $form;
    }
}

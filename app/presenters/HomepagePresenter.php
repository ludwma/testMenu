<?php

namespace App\Presenters;

use Nette;
use App\Model;
use dropDownMenu;


class HomepagePresenter extends BasePresenter
{
 private $MenuManager;
 
 public function __construct(\App\Model\MenuManager $m) {
     parent::__construct();
     $this->MenuManager = $m;
 }
 
 protected function createComponentDropdown()
 {
  $control = new \dropDownMenu($this->MenuManager);
  return $control;
 }
    

}

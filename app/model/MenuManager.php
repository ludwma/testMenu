<?php

namespace App\Model;

use Nette;

class MenuManager
{
    private $DatabaseContext;
    
    public function __construct(\Nette\Database\Context $c) {
	$this->DatabaseContext = $c;
    }
    
    public function addCategory($name,$upcategoryy)
    {
	try{
	//vyhledani nadkategorie
	$UpCategory = $this->DatabaseContext->table("kategorie")->where(["nazev"=>$upcategoryy])->fetch();
	//kdyz kategorie nema nadkategorii , ulozi se s id nadkategorie 0 , coz bude ve vypisu znamenat ze zadnou nema
	if($UpCategory == FALSE){
	$this->DatabaseContext->table("kategorie")->insert(["nazev"=>$name,"id_nadkategorie"=>0]);    
	}
	//kdyz ma kategorie nadkategorii , jeji id se ulozi do id_nadkategorie a z tech se po te ve vypisu posklada struktura
	else{
	  $this->DatabaseContext->table("kategorie")->insert(["nazev"=>$name,"id_nadkategorie"=>$UpCategory["id"]]);    
	}} catch (\Nette\Database\UniqueConstraintViolationException $e){    return FALSE;}
return true;
    }
    
    public function UpdateCategory($name,$newname,$newupcategoryy)
    {
	try{
	//vyhledani nadkategorie
	$UpCategory = $this->DatabaseContext->table("kategorie")->where(["nazev"=>$newupcategoryy])->fetch();
	//kdyz kategorie nema nadkategorii , ulozi se s id nadkategorie 0 , coz bude ve vypisu znamenat ze zadnou nema
	if($UpCategory == FALSE){
	$this->DatabaseContext->table("kategorie")->where(["nazev"=>$name])->update(["nazev"=>$name,"id_nadkategorie"=>0]);    
	}
	//kdyz ma kategorie nadkategorii , jeji id se ulozi do id_nadkategorie a z tech se po te ve vypisu posklada struktura
	else{
	  $this->DatabaseContext->table("kategorie")->where(["nazev"=>$name])->update(["nazev"=>$newname,"id_nadkategorie"=>$UpCategory["id"]]);    
	}} catch (\Nette\Database\UniqueConstraintViolationException $e){    return FALSE;}
return true;
    }


    public function removeCategory($nazev)
    {
	$this->DatabaseContext->table("kategorie")->where(["nazev"=>$nazev])->delete();
    }


    //ziska vsechny kategorie
    public function getCategories()
    {
	$k1 = $this->DatabaseContext->table("kategorie")->fetchAll();
	return $k1;
    }
}


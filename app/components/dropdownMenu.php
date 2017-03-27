<?php

use Nette\Application\UI;

class dropDownMenu extends UI\Control
{
    private $MenuManager;


    public function __construct($m) {
	parent::__construct();
	$this->MenuManager = $m;
    }

    public function render()
    {
     //nejdrive ziskam vsechny kategorie
     $kategorie = $this->MenuManager->getCategories();
     echo '<table><tr>';
    foreach ($kategorie as $kat)
     {
	 unset($kategorie[array_search($kat,$kategorie)]);
	 if($kat["id_nadkategorie"] == 0)
	 {
	      echo '<td><div class="dropdown">';
	     echo '<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">'.$kat["nazev"].'<span class="caret"></span></button>';
	     echo'<ul class="dropdown-menu">';
	     $this->najdiPod($kat["id"],$kategorie,$kat);
	     echo '</ul>';
	      echo "</td></div>";
	 }
     }
     echo'</tr></table>';
    }
    
    
    private function najdiPod($id,$kategorie,$kat)
 {
     unset($kategorie[array_search($kat,$kategorie)]);
     if($kat["id_nadkategorie"] != 0)
     {
     echo '<li class="dropdown-submenu">';
    echo '<a class="test" tabindex="-1" href="#">'.$kat["nazev"].'<span class="caret"></span></a>';
    echo '<ul class="dropdown-menu">';
     }
    foreach ($kategorie as $kat)
    {
	if($kat["id_nadkategorie"]==$id)
	{
	    $this->najdiPod($kat["id"], $kategorie, $kat);
	}
    }
    if($kat["id_nadkategorie"]!=0)
    {
    echo '</ul>';
    echo '</li>';
    }
 }
}


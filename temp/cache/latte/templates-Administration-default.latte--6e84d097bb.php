<?php
// source: C:\wampnovej\www\app\presenters/templates/Administration/default.latte

use Latte\Runtime as LR;

class Template6e84d097bb extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
	];

	public $blockTypes = [
		'content' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('content', get_defined_vars());
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
		/* line 2 */
		$this->createTemplate('..\Utrzky\navigace.latte', $this->params, "include")->renderToContentType('html');
?>
<div class="col-lg-12">
<h1>Administrace menu</h1>
<br>
</div>

<?php
		$form = $_form = $this->global->formsStack[] = $this->global->uiControl["pridatKategoriiForm"];
		?><form class="form"<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), array (
		'class' => NULL,
		), FALSE) ?>>
<h2>Přidat kategorii</h2>
<input type="text" placeholder="Jméno kategorie"<?php
		$_input = end($this->global->formsStack)["name"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		'placeholder' => NULL,
		))->attributes() ?>>
<input type="text" placeholder="jméno nadkategorie"<?php
		$_input = end($this->global->formsStack)["upname"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		'placeholder' => NULL,
		))->attributes() ?>>
<input type="submit" value="Vytvoř"<?php
		$_input = end($this->global->formsStack)["submit"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		'value' => NULL,
		))->attributes() ?>>
<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack), FALSE);
?></form>

<br>

<?php
		$form = $_form = $this->global->formsStack[] = $this->global->uiControl["upravitKategoriiForm"];
		?><form class="form"<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), array (
		'class' => NULL,
		), FALSE) ?>>
<h2>Upravit kategorii</h2>
<input type="text" placeholder="Jméno kategorie"<?php
		$_input = end($this->global->formsStack)["oldname"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		'placeholder' => NULL,
		))->attributes() ?>>
<input type="text" placeholder="Nové jméno kategorie"<?php
		$_input = end($this->global->formsStack)["name"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		'placeholder' => NULL,
		))->attributes() ?>>
<input type="text" placeholder="Nové jméno nadkategorie"<?php
		$_input = end($this->global->formsStack)["upname"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		'placeholder' => NULL,
		))->attributes() ?>>
<input type="submit" value="Uprav"<?php
		$_input = end($this->global->formsStack)["submit"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		'value' => NULL,
		))->attributes() ?>>
<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack), FALSE);
?></form>

<br>

<?php
		$form = $_form = $this->global->formsStack[] = $this->global->uiControl["odstranKategoriiForm"];
		?><form class="form"<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), array (
		'class' => NULL,
		), FALSE) ?>>
    <h1>Odstranit kategorii</h1>
    <input placeholder="Jméno"<?php
		$_input = end($this->global->formsStack)["jmeno"];
		echo $_input->getControlPart()->addAttributes(array (
		'placeholder' => NULL,
		))->attributes() ?>>
    <input value="odstraň"<?php
		$_input = end($this->global->formsStack)["submit"];
		echo $_input->getControlPart()->addAttributes(array (
		'value' => NULL,
		))->attributes() ?>>
<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack), FALSE);
?></form>
<?php
	}

}

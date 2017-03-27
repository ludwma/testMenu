<?php
// source: C:\wampnovej\www\app\presenters/templates/Login/default.latte

use Latte\Runtime as LR;

class Template7992b1be74 extends Latte\Runtime\Template
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
<h1>Přihlášení</h1>

<?php
		$form = $_form = $this->global->formsStack[] = $this->global->uiControl["loginForm"];
		?><form class="form"<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), array (
		'class' => NULL,
		), FALSE) ?>>
<input<?php
		$_input = end($this->global->formsStack)["jmeno"];
		echo $_input->getControlPart()->attributes() ?>>
<input<?php
		$_input = end($this->global->formsStack)["heslo"];
		echo $_input->getControlPart()->attributes() ?>>
<input<?php
		$_input = end($this->global->formsStack)["odeslat"];
		echo $_input->getControlPart()->attributes() ?>>
<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack), FALSE);
		?></form><?php
	}

}

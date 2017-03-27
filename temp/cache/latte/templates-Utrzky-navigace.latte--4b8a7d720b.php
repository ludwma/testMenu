<?php
// source: C:\wampnovej\www\app\presenters\templates\Utrzky\navigace.latte

use Latte\Runtime as LR;

class Template4b8a7d720b extends Latte\Runtime\Template
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
?>
<div class="col-lg-12 navigace">
<a class="odkaz" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:default")) ?>">hlavní strana</a>
<a class="odkaz" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Administration:default")) ?>">Administrace</a>
</div>

<?php
		if (!$user->isLoggedIn()) {
?><div class="col-lg-12 loginform">
<?php
			$form = $_form = $this->global->formsStack[] = $this->global->uiControl["loginForm"];
			?><form class="form"<?php
			echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), array (
			'class' => NULL,
			), FALSE) ?>>
    <input placeholder="Uživatelské jméno"<?php
			$_input = end($this->global->formsStack)["jmeno"];
			echo $_input->getControlPart()->addAttributes(array (
			'placeholder' => NULL,
			))->attributes() ?>>
    <input placeholder="heslo"<?php
			$_input = end($this->global->formsStack)["heslo"];
			echo $_input->getControlPart()->addAttributes(array (
			'placeholder' => NULL,
			))->attributes() ?>>
<input value="Login"<?php
			$_input = end($this->global->formsStack)["odeslat"];
			echo $_input->getControlPart()->addAttributes(array (
			'value' => NULL,
			))->attributes() ?>>
<?php
			echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack), FALSE);
?></form>
</div>
<?php
		}
?>

<?php
		if ($user->isLoggedIn()) {
?><div class="col-lg-12 ListaPrihlaseneho">
    <h2>Vítejte <?php echo LR\Filters::escapeHtmlText($user->identity->data['username']) /* line 18 */ ?></h2>
<?php
			$form = $_form = $this->global->formsStack[] = $this->global->uiControl["logOutForm"];
			?>    <form<?php
			echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), array (
			), FALSE) ?>>
	<input type="submit" value="Odhlásit"<?php
			$_input = end($this->global->formsStack)["odhlas"];
			echo $_input->getControlPart()->addAttributes(array (
			'type' => NULL,
			'value' => NULL,
			))->attributes() ?>>
<?php
			echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack), FALSE);
?>    </form>
</div>
<?php
		}
		
	}

}

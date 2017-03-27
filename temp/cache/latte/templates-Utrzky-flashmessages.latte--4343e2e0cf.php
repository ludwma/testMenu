<?php
// source: C:\wampnovej\www\app\presenters\templates\Utrzky\flashmessages.latte

use Latte\Runtime as LR;

class Template4343e2e0cf extends Latte\Runtime\Template
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
		if (isset($this->params['flash'])) trigger_error('Variable $flash overwritten in foreach on line 4');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
		$iterations = 0;
		foreach ($flashes as $flash) {
?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="<?php echo LR\Filters::escapeHtmlAttr($flash->type) /* line 6 */ ?>">
            <h2 class="bleskUspech"><?php echo LR\Filters::escapeHtmlText($flash->message) /* line 7 */ ?></h2>
        </div>
    </div>
<?php
			$iterations++;
		}
		
	}

}

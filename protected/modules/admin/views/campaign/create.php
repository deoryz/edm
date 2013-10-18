<?php
$this->breadcrumbs=array(
	'Campaigns'=>array('index'),
	'Add',
);

$this->menu=array(
	array('label'=>'List Campaign', 'icon'=>'th-list','url'=>array('index')),
);
?>

<h1>Add Campaign</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
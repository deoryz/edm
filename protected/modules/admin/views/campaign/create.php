<?php
$this->breadcrumbs=array(
	'Promosi'=>array('index'),
	'Add',
);

$this->menu=array(
	array('label'=>'List Promosi', 'icon'=>'th-list','url'=>array('index')),
);
?>

<h1>Add Promosi</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
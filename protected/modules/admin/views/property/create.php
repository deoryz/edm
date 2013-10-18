<?php
$this->breadcrumbs=array(
	'Properties'=>array('index'),
	'Add',
);

$this->menu=array(
	array('label'=>'List Property', 'icon'=>'th-list','url'=>array('index')),
);
?>

<h1>Add Property</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
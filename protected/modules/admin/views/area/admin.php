<?php
$this->breadcrumbs=array(
	'Areas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Area','url'=>array('index')),
	array('label'=>'Add Area','url'=>array('create')),
);
?>

<h1>Manage Areas</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'area-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nama',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>

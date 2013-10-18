<?php
$this->breadcrumbs=array(
	'Kontaks'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Kontak','url'=>array('index')),
	array('label'=>'Add Kontak','url'=>array('create')),
);
?>

<h1>Manage Kontaks</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'kontak-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'id_group',
		'nama',
		'email',
		'status',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>

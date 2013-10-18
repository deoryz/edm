<?php
$this->breadcrumbs=array(
	'Group Kontaks'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List GroupKontak','url'=>array('index')),
	array('label'=>'Add GroupKontak','url'=>array('create')),
);
?>

<h1>Manage Group Kontaks</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'group-kontak-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nama',
		'status',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>

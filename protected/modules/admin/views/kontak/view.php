<?php
$this->breadcrumbs=array(
	'Kontaks'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Kontak', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Kontak', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit Kontak', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Kontak', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View Kontak #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_group',
		'nama',
		'email',
		'status',
	),
)); ?>

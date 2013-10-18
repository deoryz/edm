<?php
$this->breadcrumbs=array(
	'Properties'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Property', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Property', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit Property', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Property', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View Property #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'type',
		'jenis',
		'area',
		'bedroom',
		'shower',
		'carport',
		'luas_tanah',
		'luas_bangunan',
		'harga',
		'score',
		'intro',
		'deskripsi',
	),
)); ?>

<?php
$this->breadcrumbs=array(
	'Galleries'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Gallery', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Gallery', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit Gallery', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Gallery', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View Gallery #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_property',
		'images',
		'date_input',
		'date_modified',
		'active',
		'sort',
	),
)); ?>

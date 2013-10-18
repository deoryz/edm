<?php
$this->breadcrumbs=array(
	'Campaigns'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Campaign', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Campaign', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit Campaign', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Campaign', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View Campaign #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nama',
		'id_kontak',
		'subject',
		'html_message',
		'text_message',
		'tgl_input',
		'tgl_update',
		'status',
		'active',
	),
)); ?>

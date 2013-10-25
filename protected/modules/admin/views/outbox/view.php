<?php
$this->breadcrumbs=array(
	'Outboxes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Outbox', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Outbox', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit Outbox', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Outbox', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View Outbox #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'to',
		'cc',
		'bcc',
		'from',
		'subject',
		'html_message',
		'text_message',
		'tgl_input',
		'tgl_kirim',
		'status',
	),
)); ?>

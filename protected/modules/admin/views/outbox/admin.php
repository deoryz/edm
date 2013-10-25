<?php
$this->breadcrumbs=array(
	'Outboxes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Outbox','url'=>array('index')),
	array('label'=>'Add Outbox','url'=>array('create')),
);
?>

<h1>Manage Outboxes</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'outbox-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'to',
		'cc',
		'bcc',
		'from',
		'subject',
		/*
		'html_message',
		'text_message',
		'tgl_input',
		'tgl_kirim',
		'status',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>

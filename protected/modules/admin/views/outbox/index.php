<?php
$this->breadcrumbs=array(
	'Outboxes',
);

$this->menu=array(
	// array('label'=>'Add Outbox', 'icon'=>'th-list','url'=>array('create')),
);
?>

<h1>Outboxes</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'outbox-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		// 'id',
		'to',
		// 'cc',
		// 'bcc',
		// 'from',
		'subject',
		'tgl_input',
		array(
			'name'=>'status',
			'filter'=>array('0'=>'Pending', '1'=>'Terkirim'),
			'value'=>'($data->status==1)?"Terkirim":"Pending"',
		),
		/*
		'html_message',
		'text_message',
		'tgl_kirim',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{delete}'
		),
	),
)); ?>

<?php
$this->breadcrumbs=array(
	'Campaigns'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Campaign','url'=>array('index')),
	array('label'=>'Add Campaign','url'=>array('create')),
);
?>

<h1>Manage Campaigns</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'campaign-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nama',
		'id_kontak',
		'subject',
		'html_message',
		'text_message',
		/*
		'tgl_input',
		'tgl_update',
		'status',
		'active',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>

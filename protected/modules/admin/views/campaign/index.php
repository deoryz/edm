<?php
$this->breadcrumbs=array(
	'Promosi',
);

$this->menu=array(
	array('label'=>'Add Promosi', 'icon'=>'th-list','url'=>array('create')),
);
?>

<h1>Promosi</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'campaign-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		// 'id',
		'nama',
		'subject',
		'tgl_input',
		array(
			'name'=>'active',
			'filter'=>array('0'=>'Deactive', '1'=>'Active'),
			'value'=>'($data->active==1)?"Active":"Deactive"',
		),
		'status',
		// 'html_message',
		// 'text_message',
		/*
		'tgl_update',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} {delete}'
		),
	),
)); ?>

<?php
$this->breadcrumbs=array(
	'Group Kontak',
);

$this->menu=array(
	array('label'=>'Add Group Kontak', 'icon'=>'th-list','url'=>array('create')),
);
?>

<h1>Group Kontak</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'group-kontak-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		// 'id',
		'nama',
		array(
			'name'=>'status',
			'filter'=>array('0'=>'Deactive', '1'=>'Active'),
			'value'=>'($data->status==1)?"Active":"Deactive"',
		),
		array(
			'header'=>'Lihat',
			'type'=>'raw',
			'value'=>'CHtml::link("Lihat Kontak", array("/admin/kontak/index", "group"=>$data->id))',
		),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} {delete}'
		),
	),
)); ?>

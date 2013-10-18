<?php
$this->breadcrumbs=array(
	'Group Kontak'=>array('/admin/groupKontak/index'),
	'Kontak',
);

$this->menu=array(
	array('label'=>'Add Kontak', 'icon'=>'th-list','url'=>array('create', 'group'=>$_GET['group'])),
);
?>

<h1>Kontak</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'kontak-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		// 'id',
		// 'group_id',
		'nama',
		'email',
		array(
			'name'=>'status',
			'filter'=>array('0'=>'Deactive', '1'=>'Active'),
			'value'=>'($data->status==1)?"Active":"Deactive"',
		),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} {delete}',
			'deleteButtonUrl'=>'Yii::app()->createUrl("/admin/'.$this->id.'/delete", array("id" => $data->id, "group" => $data->group_id))',
			'updateButtonUrl'=>'Yii::app()->createUrl("/admin/'.$this->id.'/update", array("id" => $data->id, "group" => $data->group_id))',
		),
	),
)); ?>

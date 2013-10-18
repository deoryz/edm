<?php
$this->breadcrumbs=array(
	'Properties',
);

$this->menu=array(
	array('label'=>'Add Property', 'icon'=>'th-list','url'=>array('create')),
);
?>

<h1>Properties</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'property-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'type',
		'jenis',
		'area',
		'bedroom',
		'shower',
		/*
		'carport',
		'luas_tanah',
		'luas_bangunan',
		'harga',
		'score',
		'intro',
		'deskripsi',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} {delete}'
		),
	),
)); ?>

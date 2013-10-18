<?php
$this->breadcrumbs=array(
	'Galleries',
);

$this->menu=array(
	array('label'=>'Add Gallery', 'icon'=>'th-list','url'=>array('create')),
);
?>

<h1>Galleries</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'gallery-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'id_property',
		'images',
		'date_input',
		'date_modified',
		'active',
		/*
		'sort',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} {delete}'
		),
	),
)); ?>

<?php
$this->breadcrumbs=array(
	'Properties'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);

$this->menu=array(
	array('label'=>'List Property', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Property', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View Property', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<h1>Edit Property <?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
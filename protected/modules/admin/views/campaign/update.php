<?php
$this->breadcrumbs=array(
	'Campaigns'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);

$this->menu=array(
	array('label'=>'List Campaign', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Campaign', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View Campaign', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<h1>Edit Campaign <?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
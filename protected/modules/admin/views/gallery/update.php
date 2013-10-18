<?php
$this->breadcrumbs=array(
	'Galleries'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);

$this->menu=array(
	array('label'=>'List Gallery', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Gallery', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View Gallery', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<h1>Edit Gallery <?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
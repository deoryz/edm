<?php
$this->breadcrumbs=array(
	'Group Kontak'=>array('/admin/groupKontak/index'),
	'Kontak'=>array('index', 'group'=>$_GET['group']),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);

$this->menu=array(
	array('label'=>'List Kontak', 'icon'=>'th-list','url'=>array('index', 'group'=>$_GET['group'])),
	array('label'=>'Add Kontak', 'icon'=>'plus-sign','url'=>array('create', 'group'=>$_GET['group'])),
	// array('label'=>'View Kontak', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<h1>Edit Kontak <?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
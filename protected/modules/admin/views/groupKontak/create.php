<?php
$this->breadcrumbs=array(
	'Group Kontak'=>array('index'),
	'Add',
);

$this->menu=array(
	array('label'=>'List Group Kontak', 'icon'=>'th-list','url'=>array('index')),
);
?>

<h1>Add Group Kontak</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
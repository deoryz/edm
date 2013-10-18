<?php
$this->breadcrumbs=array(
	'Group Kontak'=>array('/admin/groupKontak/index'),
	'Kontak'=>array('index', 'group'=>$_GET['group']),
	'Add',
);

$this->menu=array(
	array('label'=>'List Kontak', 'icon'=>'th-list','url'=>array('index', 'group'=>$_GET['group'])),
);
?>

<h1>Add Kontak</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
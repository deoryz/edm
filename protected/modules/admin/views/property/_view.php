<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jenis')); ?>:</b>
	<?php echo CHtml::encode($data->jenis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('area')); ?>:</b>
	<?php echo CHtml::encode($data->area); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bedroom')); ?>:</b>
	<?php echo CHtml::encode($data->bedroom); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shower')); ?>:</b>
	<?php echo CHtml::encode($data->shower); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('carport')); ?>:</b>
	<?php echo CHtml::encode($data->carport); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('luas_tanah')); ?>:</b>
	<?php echo CHtml::encode($data->luas_tanah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('luas_bangunan')); ?>:</b>
	<?php echo CHtml::encode($data->luas_bangunan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('harga')); ?>:</b>
	<?php echo CHtml::encode($data->harga); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('score')); ?>:</b>
	<?php echo CHtml::encode($data->score); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('intro')); ?>:</b>
	<?php echo CHtml::encode($data->intro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deskripsi')); ?>:</b>
	<?php echo CHtml::encode($data->deskripsi); ?>
	<br />

	*/ ?>

</div>
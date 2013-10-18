<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_kontak')); ?>:</b>
	<?php echo CHtml::encode($data->id_kontak); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subject')); ?>:</b>
	<?php echo CHtml::encode($data->subject); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('html_message')); ?>:</b>
	<?php echo CHtml::encode($data->html_message); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('text_message')); ?>:</b>
	<?php echo CHtml::encode($data->text_message); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl_input')); ?>:</b>
	<?php echo CHtml::encode($data->tgl_input); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl_update')); ?>:</b>
	<?php echo CHtml::encode($data->tgl_update); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('active')); ?>:</b>
	<?php echo CHtml::encode($data->active); ?>
	<br />

	*/ ?>

</div>
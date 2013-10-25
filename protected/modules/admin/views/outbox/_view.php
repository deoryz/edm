<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('to')); ?>:</b>
	<?php echo CHtml::encode($data->to); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cc')); ?>:</b>
	<?php echo CHtml::encode($data->cc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bcc')); ?>:</b>
	<?php echo CHtml::encode($data->bcc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('from')); ?>:</b>
	<?php echo CHtml::encode($data->from); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subject')); ?>:</b>
	<?php echo CHtml::encode($data->subject); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('html_message')); ?>:</b>
	<?php echo CHtml::encode($data->html_message); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('text_message')); ?>:</b>
	<?php echo CHtml::encode($data->text_message); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl_input')); ?>:</b>
	<?php echo CHtml::encode($data->tgl_input); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl_kirim')); ?>:</b>
	<?php echo CHtml::encode($data->tgl_kirim); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	*/ ?>

</div>
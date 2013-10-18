<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'type',array('class'=>'span5','maxlength'=>9)); ?>

	<?php echo $form->textFieldRow($model,'jenis',array('class'=>'span5','maxlength'=>9)); ?>

	<?php echo $form->textFieldRow($model,'area',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'bedroom',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'shower',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'carport',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'luas_tanah',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'luas_bangunan',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'harga',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'score',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'intro',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'deskripsi',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

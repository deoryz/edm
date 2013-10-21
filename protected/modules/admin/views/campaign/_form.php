<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'campaign-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<?php if(Yii::app()->user->hasFlash('success')): ?>
	
	    <?php $this->widget('bootstrap.widgets.TbAlert', array(
	        'alerts'=>array('success'),
	    )); ?>
	
	<?php endif; ?>

	<?php echo $form->textFieldRow($model,'nama',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'subject',array('class'=>'span5','maxlength'=>225)); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'contact',array('class'=>'control-label')) ?>
		<div class="controls">
		<?php $this->widget('application.extensions.jmultiselect2side.Jmultiselect2side',array(
            'model'=>$model,
            'attribute'=>'contact', //selected items
            // 'labelsx'=>'Disponible',
            // 'labeldx'=>'Seleccionado',
            'moveOptions'=>false,
            'autoSort'=>'true',
            // 'search' =>'Filtro:',
          	'list'=>CHtml::listData(GroupKontak::model()->findAll(),'id','nama'),
	 
	    )); ?>
	    <div class="clear"></div>
		</div>
	</div>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Lanjut ke step 2',
		)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			// 'buttonType'=>'submit',
			// 'type'=>'info',
			'url'=>CHtml::normalizeUrl(array('index')),
			'label'=>'Batal',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

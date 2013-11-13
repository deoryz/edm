<?php
$this->breadcrumbs=array(
	'Promosi'=>array('index'),
	'Add',
);

$this->menu=array(
	array('label'=>'List Promosi', 'icon'=>'th-list','url'=>array('index')),
);
?>

<h1>Promosi</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>

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

	<?php echo $form->uneditableRow($model,'nama',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->uneditableRow($model,'subject',array('class'=>'span5','maxlength'=>225)); ?>

	<div class="" style="display: none;">
		<?php echo $form->textField($model,'template',array('class'=>'span5','maxlength'=>225)); ?>

		<?php echo $form->textArea($model,'html_message',array('class'=>'span5', 'rows'=>10)); ?>

		<?php echo $form->textArea($model,'text_message',array('class'=>'span5', 'rows'=>10)); ?>
	</div>
	<div class="control-group">
		<label for="Campaign_subject" class="control-label">Pilih template</label>
		<div class="controls">
			<?php $this->widget('bootstrap.widgets.TbButton', array(
				// 'buttonType'=>'submit',
				// 'type'=>'info',
				'url'=>CHtml::normalizeUrl(array('createstepbasic', 'id'=>$_GET['id'])),
				'label'=>'Template Basic',
				'htmlOptions'=>array(
					// 'class'=>'select-template',
				),
			)); ?>
			<?php $this->widget('bootstrap.widgets.TbButton', array(
				// 'buttonType'=>'submit',
				// 'type'=>'info',
				'url'=>CHtml::normalizeUrl(array('createstepproperty', 'id'=>$_GET['id'])),
				'label'=>'Template Property',
				'htmlOptions'=>array(
					// 'class'=>'select-template',
				),
			)); ?>
		    <div class="clear"></div>
		</div>
	</div>

	<?php /*
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Lanjut ke step 3',
		)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			// 'buttonType'=>'submit',
			// 'type'=>'info',
			'url'=>CHtml::normalizeUrl(array('update', 'id'=>$_GET['id'])),
			'label'=>'back',
		)); ?>
	</div>
	*/ ?>

<?php $this->endWidget(); ?>
<?php $this->widget('application.extensions.fancyapps.EFancyApps', array(
    'target'=>'',
    'config'=>array(),
    )
); ?>

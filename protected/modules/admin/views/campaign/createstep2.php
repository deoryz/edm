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

	<div class="control-group">
		<label for="Campaign_subject" class="control-label">Pilih template</label>
		<div class="controls">
			<?php $this->widget('bootstrap.widgets.TbButton', array(
				// 'buttonType'=>'submit',
				// 'type'=>'info',
				'url'=>CHtml::normalizeUrl(array('template', 'name'=>'basic')),
				'label'=>'Template Basic',
				'htmlOptions'=>array(
					'class'=>'select-template',
				),
			)); ?>
			<?php $this->widget('bootstrap.widgets.TbButton', array(
				// 'buttonType'=>'submit',
				// 'type'=>'info',
				'url'=>CHtml::normalizeUrl(array('template', 'name'=>'property')),
				'label'=>'Template Property',
				'htmlOptions'=>array(
					'class'=>'select-template',
				),
			)); ?>
		    <div class="clear"></div>
		</div>
	</div>
	<iframe src="" id="iframe-template" class="iframe-template" frameborder="0" style="display: none;" width="100%" height="600"></iframe>
	
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

<?php $this->endWidget(); ?>
<script type="text/javascript">
	$(function(){

		$('.select-template').live('click', function() {
			$('.iframe-template').attr('src', $(this).attr('href'));
			$('.iframe-template').show();
			return false;
		})
		$('.iframe-template').load(function(){

	        var iframe = $('.iframe-template').contents();

	        // template basic
	        iframe.find(".iframe-test").bind('click', function(){
	               alert("test");
	        });

		});

	})
</script>
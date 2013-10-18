<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'gallery-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<?php if(Yii::app()->user->hasFlash('success')): ?>
	
	    <?php $this->widget('bootstrap.widgets.TbAlert', array(
	        'alerts'=>array('success'),
	    )); ?>
	
	<?php endif; ?>

	<?php echo $form->textFieldRow($model,'id_property',array('class'=>'span5')); ?>

	<?php // echo $form->textFieldRow($model,'images',array('class'=>'span5','maxlength'=>225)); ?>

	<?php // echo $form->textFieldRow($model,'date_input',array('class'=>'span5')); ?>

	<?php // echo $form->textFieldRow($model,'date_modified',array('class'=>'span5')); ?>

	<?php // echo $form->textFieldRow($model,'active',array('class'=>'span5')); ?>

	<?php // echo $form->textFieldRow($model,'sort',array('class'=>'span5')); ?>

	    <div class="control-group ">
		<?php echo $form->hiddenField($model,'images') ?>
		<input type="hidden" id="x" name="Position[x]" value="<?php echo $model->picture->x; ?>" />
		<input type="hidden" id="y" name="Position[y]" value="<?php echo $model->picture->y; ?>" />
		<input type="hidden" id="w" name="Position[w]" value="<?php echo $model->picture->w; ?>" />
		<input type="hidden" id="h" name="Position[h]" value="<?php echo $model->picture->h; ?>" />
    	<?php echo $form->labelEx($model, 'images', array('class'=>'control-label')) ?>
    	<div class="controls">
			<div class="upload-filenya">
	    		<!-- Mengeluarkan Fancybox untuk upload file -->
				<a href="#inline" class="btn btn-primary addpicture">Select Picture</a>
			    <br>
			    <br>
			    <!-- The global progress bar -->
			    <div id="progress" class="progress progress-success progress-striped">
			        <div class="bar"></div>
			    </div>
			</div>
			<div class="crop-filenya">
				<?php if ($model->scenario == 'update'): ?>
				<img src="<?php echo Yii::app()->baseUrl ?>/images/gallery/large/<?php echo $model->images.'?'.md5(time()+rand()) ?>" class="crop-image">
				<?php else: ?>
					<img src="<?php echo Yii::app()->baseUrl ?>/images/not-available.jpg" class="crop-image">
				<?php endif ?>
			    <br>
			    <?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'link',
					'type'=>'primary',
					'label'=>'Change Image',
					'htmlOptions'=>array('class'=>'change-image'),
				)); ?>
			</div>
		</div>

    </div>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Add' : 'Save',
		)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			// 'buttonType'=>'submit',
			// 'type'=>'info',
			'url'=>CHtml::normalizeUrl(array('index')),
			'label'=>'Batal',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

<?php
// Mini Upload
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/asset/js/miniupload/assets/js/jquery.knob.js', CClientScript::POS_HEAD);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/asset/js/miniupload/assets/js/jquery.ui.widget.js', CClientScript::POS_HEAD);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/asset/js/miniupload/assets/js/jquery.iframe-transport.js', CClientScript::POS_HEAD);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/asset/js/miniupload/assets/js/jquery.fileupload.js', CClientScript::POS_HEAD);

// jCrop
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/asset/js/jcrop/js/jquery.Jcrop.min.js', CClientScript::POS_HEAD);

// CSS
// Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/asset/js/fileupload/css/jquery.fileupload-ui.css');
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/asset/js/jcrop/css/jquery.Jcrop.css');

// Script Upload Crop
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/asset/js/miniupload/assets/js/script-upload-crop.js', CClientScript::POS_HEAD);

// Request Fancybox
$this->widget('application.extensions.fancyapps.EFancyApps', array(
    'target'=>'.addpicture',
    'config'=>array(
	    'maxWidth'	=> 300,
		'maxHeight'	=> 300,
		'fitToView'	=> false,
		'autoSize'	=> false,
		'closeClick'	=> false,
		'openEffect'	=> 'none',
		'closeEffect'	=> 'none'
    ),
)); 
?>
<script type="text/javascript">
	var miniupload_crop_status = '<?php echo $model->scenario ?>'; // fill with add or update
	var miniupload_crop_object = $('#Gallery_images'); // fill with add or update
	var miniupload_crop_width = 176; // fill with add or update
	var miniupload_crop_height = 123; // fill with add or update
</script>
<div style="width: 317px; display: none;" id="inline">
	<div class="galllery-upload-container">
		<form id="upload" method="post" action="<?php echo CHtml::normalizeUrl(array('upload')); ?>" enctype="multipart/form-data">
		    <div id="drop">
		        <p>Drop Here</p>

		        <a class="btn btn-primary">Browse</a>
		        <input type="file" name="upl" style="display: none;" />
		        <input type="hidden" name="Gallery[images]" value="<?php echo $model->images ?>" />
		    </div>
		</form>
	</div>
</div>

<script type="text/javascript">
if (typeof RedactorPlugins === 'undefined') var RedactorPlugins = {};

RedactorPlugins.advanced = {
    init: function()
    {
        alert(1);
    }
}
</script>

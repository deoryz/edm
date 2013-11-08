<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'property-form',
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

	<?php echo $form->dropDownListRow($model,'type',array(
		'Rumah'=>'Rumah',
		'Apartemen'=>'Apartemen',
		'Gudang'=>'Gudang',
		'Tanah'=>'Tanah',
		'Ruko'=>'Ruko',
	),array('class'=>'span3','maxlength'=>9, 'empty'=>'---------- Pilih Type ----------')); ?>

	<?php echo $form->dropDownListRow($model,'jenis',array(
		'Di Jual'=>'Di Jual',
		'Di Sewakan'=>'Di Sewakan',
	),array('class'=>'span3','maxlength'=>9, 'empty'=>'---------- Pilih Jenis ----------')); ?>

	<?php echo $form->dropDownListRow($model,'area',array(
		'Surabaya Barat'=>'Surabaya Barat',
		'Surabaya Timur'=>'Surabaya Timur',
		'Surabaya Utara'=>'Surabaya Utara',
		'Surabaya Selatan'=>'Surabaya Selatan',
		'Surabaya Pusat'=>'Surabaya Pusat',
		'Lainnya'=>'Lainnya',
	),array('class'=>'span3 gd_t_lainnya', 'empty'=>'---------- Pilih Area ----------')); ?>
	
	<div class="view-area-lain" style="display: none;">
		<?php echo $form->textFieldRow($model,'area_lain',array('class'=>'span3')); ?>
	</div>
	<?php echo $form->textFieldRow($model,'name',array('class'=>'span4')); ?>

	<?php echo $form->textFieldRow($model,'url',array('class'=>'span4')); ?>

	<?php echo $form->textFieldRow($model,'bedroom',array('class'=>'span1')); ?>

	<?php echo $form->textFieldRow($model,'shower',array('class'=>'span1')); ?>

	<?php echo $form->textFieldRow($model,'carport',array('class'=>'span1')); ?>

	<?php echo $form->textFieldRow($model,'luas_tanah',array('class'=>'span1', 'append'=>'m2')); ?>

	<?php echo $form->textFieldRow($model,'luas_bangunan',array('class'=>'span1', 'append'=>'m2')); ?>

	<?php echo $form->textFieldRow($model,'harga',array('class'=>'span2', 'prepend'=>'Rp.')); ?>

	<?php echo $form->textFieldRow($model,'bind',array('class'=>'span3', 'placeholder'=>'ex: 1,5')); ?>

	<?php echo $form->textFieldRow($model,'bind_satuan',array('class'=>'span3', 'placeholder'=>'ex: M (Milyar), Jt(Juta)')); ?>

	<?php echo $form->textFieldRow($model,'score',array('class'=>'span3', 'placeholder'=>'0 - 100')); ?>

	<?php echo $form->textAreaRow($model,'intro',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'deskripsi',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<!-- Gallery Ajax -->

	<!-- File Upload Ajax -->
<div>
	<h3>Gallery</h3>

	<!-- Tempat Thumbnail keluar -->
	<div class="gallery-box">
	    <ul class="thumbnails">
	    <?php if ($model->scenario == 'update'): ?>
	    	<?php
	    		$model2 = PropertyGallery::model()->findAll('property_id = :property_id', array(':property_id'=> $model->id));
	    	?>
		    <?php foreach ($model2 as $key => $value): ?>
		    	<li class="span2">
		        <div class="thumbnail">
		        	<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(250,200, '/images/propertyGallery/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
		        <div class="caption">
		        <a href="#" class="btn delete-gambar">Delete</a>
		        <input type="hidden" name="upl-old[]" value="<?php echo $value->image ?>">
		        </div>
		        </div>
		    	</li>
		    <?php endforeach ?>
	    <?php endif ?>
	    </ul>
	</div>

	<?php 
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
	    )
	); 
	?>
	<!-- Mengeluarkan Fancybox untuk upload file -->
	<a href="#inline" class="btn btn-primary addpicture">Add Picture</a>

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
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/asset/js/miniupload/assets/js/jquery.knob.js', CClientScript::POS_HEAD);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/asset/js/miniupload/assets/js/jquery.ui.widget.js', CClientScript::POS_HEAD);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/asset/js/miniupload/assets/js/jquery.iframe-transport.js', CClientScript::POS_HEAD);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/asset/js/miniupload/assets/js/jquery.fileupload.js', CClientScript::POS_HEAD);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/asset/js/miniupload/assets/js/script.js', CClientScript::POS_HEAD);
// Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/asset/js/miniupload/assets/css/style.css');
?>

<div style="width: 317px; display: none;" id="inline">
	<div class="galllery-upload-container">
		<form id="upload" method="post" action="<?php echo CHtml::normalizeUrl(array('upload')); ?>" enctype="multipart/form-data">
		    <div id="drop">
		        <p>Drop Here</p>

		        <a class="btn btn-primary">Browse</a>
		        <input type="file" name="upl" style="display: none;" />
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

	$('.gd_t_lainnya').live('change',function(){
		if($(this).val() == 'Lainnya'){
			$('.view-area-lain').show('750');
		}else{
			$('.view-area-lain').slideUp();
			return false;
		}
		return false;
	});
	
	var da_area = $('#Property_area_lain').val();
	
	if( da_area == '' ){
		$('.view-area-lain').slideUp();
	}else{
		$('.view-area-lain').show('750');
	}
</script>
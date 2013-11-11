<?php
$this->breadcrumbs=array(
	'Promosi'=>array('index'),
	'Add',
);

$this->menu=array(
	array('label'=>'List Promosi', 'icon'=>'th-list','url'=>array('index')),
);
?>

<h1>Template Basic</h1>
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

	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'body',array('class'=>'span5 redactor', 'rows'=>10)); ?>
	<?php Yii::import('ext.imperavi-redactor-widget.ImperaviRedactorWidget'); ?>
	<?php $this->widget('ImperaviRedactorWidget', array(
	    'selector' => '.redactor',
	    'options' => array(
	        'imageUpload'=> $this->createUrl('/admin/setting/uploadimage', array('type'=>'image')),
	        'clipboardUploadUrl'=> $this->createUrl('/admin/setting/uploadimage', array('type'=>'clip')),
            'iframe' => true,
            // 'css' => array(Yii::app()->baseUrl.'/asset/css/admin_edit_text.css'),
	    ),
	    'plugins' => array(
	        // 'fullscreen' => array(
	        //     'js' => array('fullscreen.js',),
	        // ),
	        'clips' => array(
	            // You can set base path to assets
	            // 'basePath' => 'application.components.imperavi.my_plugin',
	            // or url, basePath will be ignored.
	            // Defaults is url to plugis dir from assets
	            'baseUrl' => Yii::app()->baseUrl,
	            // 'css' => array('asset/css/admin_edit_text.css'),
	            // 'js' => array('clips.js',),
	            // add depends packages
	            // 'depends' => array('imperavi-redactor',),
	        ),
	    ),
	)); ?>

	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'link',
		'url'=>array('createstepbasic', 'id'=>$_GET['id']),
		'type'=>'primary',
		'label'=>'Preview',
		'htmlOptions'=>array('class'=>'btn-preview-template')
	)); ?>

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
			'url'=>CHtml::normalizeUrl(array('createstep2', 'id'=>$_GET['id'])),
			'label'=>'back',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
<?php $this->widget('application.extensions.fancyapps.EFancyApps', array(
    'target'=>'',
    'config'=>array(),
    )
); ?>
<script type="text/javascript">
	$('.btn-preview-template').live('click', function() {
		$.ajax({
			url: $(this).attr('href'),
			data: $('#campaign-form').serialize()+'&ajax=ajax',
			dataType: 'html',
			type: 'post',
			success: function(msg){
				$('#iframe-template').show();
				var iframe = $('.iframe-template').contents();
				iframe.find('body').html(msg);
			},
			error: function(msg){
				alert('sending data error, cek your connection');
				console.log(msg);
			}
		});
		return false;
	})
</script>
<script type="text/javascript">
if (typeof RedactorPlugins === 'undefined') var RedactorPlugins = {};

RedactorPlugins.advanced = {
    init: function()
    {
        alert(1);
    }
}
</script>
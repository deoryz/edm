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
	<?php if ($model->template ==''): ?>
		<iframe src="" id="iframe-template" class="iframe-template" frameborder="0" style="display: none;" width="100%" height="600"></iframe>
	<?php else: ?>
		<iframe src="<?php echo CHtml::normalizeUrl(array('template', 'name'=>$model->template)) ?>" id="iframe-template" class="iframe-template" frameborder="0" style="" width="100%" height="600"></iframe>
	<?php endif ?>

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
<?php $this->widget('application.extensions.fancyapps.EFancyApps', array(
    'target'=>'',
    'config'=>array(),
    )
); ?>
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
	        iframe.find(".edit-title-email").bind('click', function(){
				$.fancybox({
					'content': $('.content-edit-email').html(),
				});
	        });

	        <?php if ($model->template =='basic'): ?>
	        iframe.find(".edit-title-email").html($($('#Campaign_html_message').val()).contents().find(".edit-title-email").html());
	        iframe.find(".div-edit-content-email").html($($('#Campaign_html_message').val()).contents().find(".div-edit-content-email").html());
	        <?php endif ?>
		});
		$('.fancybox-outer #edit-title-email-form').live('submit', function() {
			var iframe = $('.iframe-template').contents();
			iframe.find(".edit-title-email").html($('.fancybox-outer input#edit-title-email-text').val());
			$.fancybox.close();
			return false;
		})
		$('#campaign-form').live('submit', function() {
			var iframe = $('.iframe-template').contents();
			iframe.find('.edit-content-email-btn').remove();
			$('#Campaign_html_message').val(iframe.find('.body-email').html());

			iframe.find('.body-email-text-title').html(iframe.find('.edit-title-email').html())
			iframe.find('.body-email-text-content').html(iframe.find('.div-edit-content-email').html())
			// var StrippedString = OriginalString.replace(/(<([^>]+)>)/ig,"");
			$('#Campaign_text_message').val(iframe.find('.body-email-text').html().replace(/(<([^>]+)>)/ig,""));
			$('#Campaign_template').val(iframe.find('.template-name').html());
			$('#campaign-form').submit();
			return false;
		})

	})
</script>
<div class="content-edit-email" style="display: none;">
	<form id="edit-title-email-form">
	<h4>Edit Header</h4>
	<input type="text" name="edit-title-email-text" id="edit-title-email-text" class="span6"><br>
	<input type="submit" class="edit-title-email-btn btn btn-primary" value="Edit Header Text">
	</form>
</div>
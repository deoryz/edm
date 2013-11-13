<?php
$this->breadcrumbs=array(
	'Promosi'=>array('index'),
	'Add',
);

$this->menu=array(
	array('label'=>'List Promosi', 'icon'=>'th-list','url'=>array('index')),
);
?>

<h1>Template Property</h1>
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

	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5', 'placeholder'=>'The Hot List')); ?>

	<?php echo $form->textFieldRow($model,'bulan',array('class'=>'span5', 'placeholder'=>'October 2013')); ?>

	<?php echo $form->textFieldRow($model,'part',array('class'=>'span5', 'placeholder'=>'Part 1')); ?>

	<?php //echo $form->hiddenField($model,'property_id',array('class'=>'span5')); ?>
	
	<?php $this->widget('bootstrap.widgets.TbGridView',array(
		'id'=>'property-grid',
		'dataProvider'=>$modelProperty->search(),
		'filter'=>$modelProperty,
		'type'=>array('striped'),
		'columns'=>array(
			// 'id',
			array(
				'name'=>'type',
				'htmlOptions'=>array('class'=>'property-value-type'),
			),
			array(
				'name'=>'jenis',
				'htmlOptions'=>array('class'=>'property-value-jenis'),
			),
			array(
				'name'=>'area',
				'htmlOptions'=>array('class'=>'property-value-area'),
			),
			array(
				'name'=>'name',
				'htmlOptions'=>array('class'=>'property-value-name'),
			),
			array(
				'name'=>'score',
				'htmlOptions'=>array('class'=>'property-value-score'),
			),
			// 'type',
			// 'jenis',
			// 'area',
			// 'name',
			// 'score',
			array(
				'header'=>'Cantumkan',
				'type'=>'raw',
				'value'=>'"<a data-id=\'".$data->id."\' href=\'#\' class=\'btn btn-primary btn-property-add\'>Cantumkan</a>"',
				'htmlOptions'=>array('style'=>'width: 100px;'),
			),
		),
	)); ?>

	<h4>Property yang di pilih</h4>
    <table class="table">
    	<tr>
    		<th>Name</th>
    		<th width="100">Delete</th>
    	</tr>
    	<tbody class="property-choose">
    	<?php foreach ($model->property_id as $key => $value): ?>
    	<?php
    	$property = Property::model()->findByPk($value);
		$str = $property->type . ' ' . $property->jenis . ' ' . $property->area . ' - ' . $property->name . ' (' . $property->score . ') ';
		?>
    	<tr>
    		<td>
    			<input type="hidden" name="TemplateProperty[property_id][]" value="<?php echo $value ?>" >
				<?php echo $str ?>
    		</td>
    		<td>
    			<a href="#" class="btn btn-primary btn-property-delete">Delete</a>
    		</td>
    	</tr>
    	<?php endforeach ?>
    	</tbody>
    </table>
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'link',
		'url'=>array('createstepproperty', 'id'=>$_GET['id']),
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
			'url'=>CHtml::normalizeUrl(array('createstep2', 'id'=>$_GET['id'], 'pilih'=>true)),
			'label'=>'Pilih Template',
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
	$('.btn-property-add').live('click', function() {
		var property_value_type = $(this).parent().parent().find('.property-value-type').html();
	// alert('ok');
		var property_value_jenis = $(this).parent().parent().find('.property-value-jenis').html();
		var property_value_area = $(this).parent().parent().find('.property-value-area').html();
		var property_value_name = $(this).parent().parent().find('.property-value-name').html();
		var property_value_score = $(this).parent().parent().find('.property-value-score').html();
		$str = property_value_type + ' ' +
		property_value_jenis + ' ' +
		property_value_area + ' - ' +
		property_value_name + ' (' +
		property_value_score + ') ';
		$('.property-choose').append('<tr><td><input type="hidden" name="TemplateProperty[property_id][]" value="'+ $(this).attr('data-id') +'" >'+ $str +'</td><td><a href="#" class="btn btn-primary btn-property-delete">Delete</a></td></tr>');
		return false;
	})
	$('.btn-property-delete').live('click', function() {
		$(this).parent().parent().remove();
		return false;
	})
	$(document).ready(function() {
	<?php if ($model2->template == 'property'): ?>
		$.ajax({
			url: $('.btn-preview-template').attr('href'),
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
	<?php endif ?>
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
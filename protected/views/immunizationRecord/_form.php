<?php
/* @var $this ImmunizationRecordController */
/* @var $model ImmunizationRecord */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'immunization-record-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="col-sm-4 mb-4 mb-sm-0">
		<?php echo $form->labelEx($model,'account_id'); ?>
		<?php echo $form->textField($model,'account_id', array('class'=>'form-control form-control-user')); ?>
		<?php echo $form->error($model,'account_id'); ?>
	</div>

	<div class="col-sm-4 mb-4 mb-sm-0">
		<?php echo $form->labelEx($model,'immunization_id'); ?>
		<?php echo $form->textField($model,'immunization_id', array('class'=>'form-control form-control-user')); ?>
		<?php echo $form->error($model,'immunization_id'); ?>
	</div>

		<div class="col-sm-4 mb-4 mb-sm-0">
			<?php echo $form->labelEx($model,'date'); ?><br />
			<?php //echo $form->textField($model,'dob',array('size'=>60,'maxlength'=>128));
				$form->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model' => $model,		
				'attribute' => 'date',
				'value' => ($model->date!=''&&$model->date!='0000-00-00')?date('F d,Y', strtotime($model->date)):null,
				// additional javascript options for the date picker plugin
				'options'=>array(
					'showAnim'=>'fold',
					'dateFormat'=> 'yy-mm-dd',
					'changeMonth'=>'true',
					'changeYear'=>'true',
					'yearRange'=>(date('Y')-80).':'.(date('Y')),
					
				),
				'htmlOptions'=>array(
					'class'=>'form-control form-control-user',
					//'tabindex'=>'15',
				),
				));
			?> 
		</div>

	<div class="col-sm-4 mb-4 mb-sm-0">
		<?php echo $form->labelEx($model,'remarks'); ?>
		<?php echo $form->textArea($model,'remarks',array('rows'=>6, 'cols'=>50, 'class'=>'form-control form-control-user')); ?>
		<?php echo $form->error($model,'remarks'); ?>
	</div>


	<div class="form-group row">
		<div class="col-sm-12" style="text-align:right">
			<?php echo CHtml::link('<span class="icon text-white-50"><i class="fas fa-user-times"></i></span><span class="text">Cancel</span>', $this->createAbsoluteUrl('site/index'), array('class'=>'btn btn-danger btn-icon-split', 'onclick'=>'return confirm("Are you sure you want to cancel creating an account?")')); ?>
			<?php echo CHtml::link('<span class="icon text-white-50"><i class="fas fa-user-check"></i></span><span class="text">Save</span>', 'javascript:document.getElementById("immunization-record-form").submit();', array('class'=>'btn btn-success btn-icon-split')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
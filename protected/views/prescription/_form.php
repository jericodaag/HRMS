<?php
/* @var $this PrescriptionController */
/* @var $model Prescription */
/* @var $form CActiveForm */


?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'prescription-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
        'class'=>'model',
    ),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="col-sm-4 mb-4 mb-sm-0">
		<?php echo $form->labelEx($model,'patient_account_id'); ?>
		<?php echo $form->textField($model,'patient_account_id',array('class'=>'form-control form-control-user')); ?>
		<?php echo $form->error($model,'patient_account_id'); ?>
	</div>

	<div class="col-sm-4 mb-4 mb-sm-0">
		<?php echo $form->labelEx($model,'doctor_account_id'); ?>
		<?php echo $form->textField($model,'doctor_account_id',array('class'=>'form-control form-control-user')); ?>
		<?php echo $form->error($model,'doctor_account_id'); ?>
	</div>

	<div class="col-sm-4 mb-4 mb-sm-0">
		<?php echo $form->labelEx($model,'consultation_id'); ?>
		<?php echo $form->textField($model,'consultation_id', array('class'=>'form-control form-control-user')); ?>
		<?php echo $form->error($model,'consultation_id'); ?>
	</div>

	<div class="col-sm-4 mb-4 mb-sm-0">
		<?php echo $form->labelEx($model,'prescription'); ?>
		<?php echo $form->textArea($model,'prescription',array('rows'=>6, 'cols'=>50, 'class'=>'form-control form-control-user')); ?>
		<?php echo $form->error($model,'prescription'); ?>
	</div>

	<div class="col-sm-4 mb-4 mb-sm-0">
		<?php echo $form->labelEx($model,'date_of_prescription'); ?>
		<?php
				$form->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model' => $model,		
				// 'attribute' => 'date_of_prescription',
				'name' => 'Prescription[date_of_prescription]',
				'value' => ($model->date_of_prescription!=''&&$model->date_of_prescription!='0000-00-00')?date('F d,Y', strtotime($model->date_of_prescription)):null,
				// additional javascript options for the date picker plugin
				'options'=>array(
					'showAnim'=>'fold',
					'dateFormat'=> 'yy-mm-dd',
					'changeMonth'=>'true',
					'changeYear'=>'true',
					'minDate' => 'dateToday',
					'yearRange'=>date('Y').':'.(date('Y')+10),
					
				),
				'htmlOptions'=>array(
					'class'=>'form-control form-control-user',
					//'tabindex'=>'15',
				),
				));
			?> 
		
	</div>


	<div class="form-group row">
		<div class="col-sm-12" style="text-align:right">
			<?php echo CHtml::link('<span class="icon text-white-50"><i class="fas fa-user-times"></i></span><span class="text">Cancel</span>', $this->createAbsoluteUrl('prescription/listPrescription'), array('class'=>'btn btn-danger btn-icon-split', 'onclick'=>'return confirm("Are you sure you want to cancel creating an account?")')); ?>
			<?php echo CHtml::link('<span class="icon text-white-50"><i class="fas fa-user-check"></i></span><span class="text">Save</span>', 'javascript:document.getElementById("prescription-form").submit();', array('class'=>'btn btn-success btn-icon-split')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
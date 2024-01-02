<?php
/* @var $this SecretaryController */
/* @var $model Secretary */
/* @var $form CActiveForm */
?>

<div class = "row">
	<div class="col-xl-8 col-lg-8">
		<div class="card shadow mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		        <h6 class="m-0 font-weight-bold text-primary">Create Clinic</h6>
		    </div>
		    <div class="card-body">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'clinic-assignment-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="col-sm-4 mb-4 mb-sm-0">
    <?php echo $form->labelEx($model, 'account_id'); ?>
    <?php echo $form->textField($model,'account_id',array('size'=>60,'maxlength'=>255, 'class'=>'form-control form-control-user')); ?>

</div>
<div class="col-sm-4 mb-4 mb-sm-0">
    <?php echo $form->labelEx($model, 'clinic_id'); ?>
    <?php echo $form->textField($model,'clinic_id',array('size'=>60,'maxlength'=>255, 'class'=>'form-control form-control-user')); ?>
</div>



<div class="form-group row">
		<div class="col-sm-12" style="text-align:right">
			<?php echo CHtml::link('<span class="icon text-white-50"><i class="fas fa-user-times"></i></span><span class="text">Cancel</span>', $this->createAbsoluteUrl('site/index'), array('class'=>'btn btn-danger btn-icon-split', 'onclick'=>'return confirm("Are you sure you want to cancel creating an account?")')); ?>
			<?php echo CHtml::link('<span class="icon text-white-50"><i class="fas fa-user-check"></i></span><span class="text">Save</span>', 'javascript:document.getElementById("clinic-assignment-form").submit();', array('class'=>'btn btn-success btn-icon-split')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

</div>
		</div>
	</div>
</div>
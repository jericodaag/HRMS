<?php
/* @var $this AccountController */
/* @var $model Account */
/* @var $form CActiveForm */
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'account-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
        'class'=>'user',
    ),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary(array($account,$user, $birthhistory)); ?>
	<div class="form-group row">
		<div class="col-sm-4 mb-4 mb-sm-0">
			<?php echo $form->labelEx($account,'username'); ?>
			<?php echo $form->textField($account,'username',array('size'=>60,'maxlength'=>128, 'class'=>'form-control form-control-user')); ?>
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-4 mb-4 mb-sm-0">
			<?php echo $form->labelEx($account,'email_address'); ?>
			<?php echo $form->textField($account,'email_address',array('size'=>60,'maxlength'=>255, 'class'=>'form-control form-control-user')); ?>
		</div>

		<div class="col-sm-4 mb-4 mb-sm-0">
			<?php echo $form->labelEx($user,'qualifier'); ?>
			<?php echo $form->textField($user,'qualifier',array('size'=>60,'maxlength'=>255, 'class'=>'form-control form-control-user')); ?>
		</div>

		<div class="col-sm-4 mb-4 mb-sm-0">
			<?php echo $form->labelEx($user,'lastname'); ?>
			<?php echo $form->textField($user,'lastname',array('size'=>60,'maxlength'=>255, 'class'=>'form-control form-control-user')); ?>
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-4 mb-4 mb-sm-0">
			<?php echo $form->labelEx($user,'firstname'); ?>
			<?php echo $form->textField($user,'firstname',array('size'=>60,'maxlength'=>255, 'class'=>'form-control form-control-user')); ?>
		</div>

		<div class="col-sm-4 mb-4 mb-sm-0">
			<?php echo $form->labelEx($user,'middlename'); ?>
			<?php echo $form->textField($user,'middlename',array('size'=>60,'maxlength'=>255, 'class'=>'form-control form-control-user')); ?>
		</div>	

		<div class="col-sm-4 mb-4 mb-sm-0">
			<?php echo $form->labelEx($user,'Name of Father'); ?>
			<?php echo $form->textField($user,'name_of_father',array('size'=>60,'maxlength'=>255, 'class'=>'form-control form-control-user')); ?>
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-4 mb-4 mb-sm-0">
			<?php echo $form->labelEx($user,'Contact number Of Father'); ?>
			<?php echo $form->textField($user,'father_contact_number',array('size'=>60,'maxlength'=>255, 'class'=>'form-control form-control-user')); ?>
		</div>

		<div class="col-sm-4 mb-4 mb-sm-0">
			<?php echo $form->labelEx($user,'Name of Mother'); ?>
			<?php echo $form->textField($user,'name_of_mother',array('size'=>60,'maxlength'=>255, 'class'=>'form-control form-control-user')); ?>
		</div>

		<div class="col-sm-4 mb-4 mb-sm-0">
			<?php echo $form->labelEx($user,'Contact number Of Mother'); ?>
			<?php echo $form->textField($user,'mother_contact_number',array('size'=>60,'maxlength'=>255, 'class'=>'form-control form-control-user')); ?>
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-4 mb-4 mb-sm-0">
			<?php echo $form->labelEx($user,'dob'); ?><br />
			<?php //echo $form->textField($model,'dob',array('size'=>60,'maxlength'=>128));
				$form->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model' => $user,		
				//'attribute' => 'DOB',
				'name' => 'User[dob]',
				'value' => ($user->dob!=''&&$user->dob!='0000-00-00')?date('F d,Y', strtotime($user->dob)):null,
				// additional javascript options for the date picker plugin
				'options'=>array(
					'showAnim'=>'fold',
					'dateFormat'=> 'MM dd,yy',
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
			<?php echo $form->labelEx($user,'gender'); ?>
			<?php echo $form->DropdownList($user, 'gender', array('' => 'Please select one', '1' => 'Male', '2' => 'Female'), array('class' => 'form-control form-control-user', 'value' => '')); ?>
		</div>
		<div class="col-sm-4 mb-4 mb-sm-0">
			<?php echo $form->labelEx($user,'address'); ?>
			<?php echo $form->textField($user,'address',array('size'=>60,'maxlength'=>255, 'class'=>'form-control form-control-user')); ?>
		</div>
	</div>
	<div id="birthHistoryForm" style='display:none;'>
		<div class="form-group row">
			<div class="col-sm-4 mb-4 mb-sm-0">
				<?php echo $form->labelEx($birthhistory,'blood_type'); ?>
				<?php echo $form->DropdownList($birthhistory, 'blood_type', array('' => 'Please select one', '1' => 'Male', '2' => 'Female'), array('class' => 'form-control form-control-user', 'value' => '')); ?>
			</div>
			<div class="col-sm-4 mb-4 mb-sm-0">
				<?php echo $form->labelEx($birthhistory,'term'); ?>
				<?php echo $form->textField($birthhistory,'term',array('size'=>60,'maxlength'=>255, 'class'=>'form-control form-control-user')); ?>
			</div>
			<div class="col-sm-4 mb-4 mb-sm-0">
				<?php echo $form->labelEx($birthhistory,'type_of_delivery'); ?>
				<?php echo $form->textField($birthhistory,'type_of_delivery',array('size'=>60,'maxlength'=>255, 'class'=>'form-control form-control-user')); ?>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-4 mb-4 mb-sm-0">
				<?php echo $form->labelEx($birthhistory,'birth_weight'); ?>
				<?php echo $form->textField($birthhistory,'birth_weight',array('size'=>60,'maxlength'=>255, 'class'=>'form-control form-control-user')); ?>
			</div>
			<div class="col-sm-4 mb-4 mb-sm-0">
				<?php echo $form->labelEx($birthhistory,'birth_length'); ?>
				<?php echo $form->textField($birthhistory,'birth_length',array('size'=>60,'maxlength'=>255, 'class'=>'form-control form-control-user')); ?>
			</div>
			<div class="col-sm-4 mb-4 mb-sm-0">
				<?php echo $form->labelEx($birthhistory,'birth_head_circumference'); ?>
				<?php echo $form->textField($birthhistory,'birth_head_circumference',array('size'=>60,'maxlength'=>255, 'class'=>'form-control form-control-user')); ?>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-4 mb-4 mb-sm-0">
				<?php echo $form->labelEx($birthhistory,'birth_chest_circumference'); ?>
				<?php echo $form->textField($birthhistory,'birth_chest_circumference',array('size'=>60,'maxlength'=>255, 'class'=>'form-control form-control-user')); ?>
			</div>
			<div class="col-sm-4 mb-4 mb-sm-0">
				<?php echo $form->labelEx($birthhistory,'birth_abdominal_circumference'); ?>
				<?php echo $form->textField($birthhistory,'birth_abdominal_circumference',array('size'=>60,'maxlength'=>255, 'class'=>'form-control form-control-user')); ?>
			</div>
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-12" style="text-align:right">
			<?php echo CHtml::link('<span class="icon text-white-50"><i class="fas fa-user-times"></i></span><span class="text">Cancel</span>', $this->createAbsoluteUrl('account/listPatient'), array('class'=>'btn btn-danger btn-icon-split', 'onclick'=>'return confirm("Are you sure you want to cancel creating an account?")')); ?>
			<?php echo CHtml::link('<span class="icon text-white-50"><i class="fas fa-user-check"></i></span><span class="text">Save</span>', 'javascript:document.getElementById("account-form").submit();', array('class'=>'btn btn-success btn-icon-split')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    $(document).ready(function() {
    // Handler for input and change events
    var checkAge = function() {
        var selectedDate = $('#User_dob').val();

        $.ajax({
            url: "<?php echo $this->createUrl('CheckAge'); ?>",
            type: 'POST',
            data: { dob: selectedDate },
            dataType: 'json',
            success: function(response) {
                if (response.age < 18) {
                    $('#birthHistoryForm').show();
                    // Additional logic if needed
                } else {
                    $('#birthHistoryForm').hide();
                    // Additional logic if needed
                }
            },
            error: function() {
                console.log('Error in AJAX request');
            }
        });
    };

    // Bind handler to input and change events
    $('#User_dob').on('input change', checkAge);

    // Trigger the check immediately on page load
    checkAge();
});

</script>
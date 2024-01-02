<?php
/* @var $this PrescriptionController */
/* @var $model Prescription */

$this->breadcrumbs=array(
	'Prescriptions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

?>

<h1>Update Prescription <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_formUpdate', array('model'=>$model)); ?>
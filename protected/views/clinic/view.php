<?php
/* @var $this ClinicController */
/* @var $model Clinic */

$this->breadcrumbs=array(
	'Clinics'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Clinic', 'url'=>array('index')),
	array('label'=>'Create Clinic', 'url'=>array('create')),
	array('label'=>'Update Clinic', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Clinic', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Clinic', 'url'=>array('admin')),
);
?>

<h1>View Clinic #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'clinic',
		'address',
		'contact_number',
		'status_id',
	),
)); ?>

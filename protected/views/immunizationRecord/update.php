<?php
/* @var $this ImmunizationRecordController */
/* @var $model ImmunizationRecord */

$this->breadcrumbs=array(
	'Immunization Records'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ImmunizationRecord', 'url'=>array('index')),
	array('label'=>'Create ImmunizationRecord', 'url'=>array('create')),
	array('label'=>'View ImmunizationRecord', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ImmunizationRecord', 'url'=>array('admin')),
);
?>

<h1>Update ImmunizationRecord <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
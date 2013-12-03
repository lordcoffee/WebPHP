<?php
/* @var $this EpisodenController */
/* @var $model Episoden */

$this->breadcrumbs=array(
	'Episodens'=>array('index'),
	$model->NR_TOTAL=>array('view','id'=>$model->NR_TOTAL),
	'Update',
);

$this->menu=array(
	array('label'=>'List Episoden', 'url'=>array('index')),
	array('label'=>'Create Episoden', 'url'=>array('create')),
	array('label'=>'View Episoden', 'url'=>array('view', 'id'=>$model->NR_TOTAL)),
	array('label'=>'Manage Episoden', 'url'=>array('admin')),
);
?>

<h1>Update Episoden <?php echo $model->NR_TOTAL; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
/* @var $this EpisodenController */
/* @var $model Episoden */

$this->breadcrumbs=array(
	'Episodens'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Episoden', 'url'=>array('index')),
	array('label'=>'Manage Episoden', 'url'=>array('admin')),
);
?>

<h1>Create Episoden</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
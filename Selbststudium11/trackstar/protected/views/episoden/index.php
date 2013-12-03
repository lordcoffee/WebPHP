<?php
/* @var $this EpisodenController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Episodens',
);

$this->menu=array(
	array('label'=>'Create Episoden', 'url'=>array('create')),
	array('label'=>'Manage Episoden', 'url'=>array('admin')),
);
?>

<h1>Episodens</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

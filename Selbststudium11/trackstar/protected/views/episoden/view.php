<?php
/* @var $this EpisodenController */
/* @var $model Episoden */

$this->breadcrumbs=array(
	'Episodens'=>array('index'),
	$model->NR_TOTAL,
);

$this->menu=array(
	array('label'=>'List Episoden', 'url'=>array('index')),
	array('label'=>'Create Episoden', 'url'=>array('create')),
	array('label'=>'Update Episoden', 'url'=>array('update', 'id'=>$model->NR_TOTAL)),
	array('label'=>'Delete Episoden', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->NR_TOTAL),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Episoden', 'url'=>array('admin')),
);
?>

<h1>View Episoden #<?php echo $model->NR_TOTAL; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'NR_TOTAL',
		'NR_STAFFEL',
		'DEUTSCHER_TITEL',
		'ORIGINAL­TITEL',
		'ERSTAUS­STRAHLUNG_USA',
		'DEUTSCH­SPRACHIGE_ERSTAUS­STRAHLUNG­_D',
		'REGIE',
		'DREHBUCH',
		'US_QUOTEN',
		'INHALT',
	),
)); ?>

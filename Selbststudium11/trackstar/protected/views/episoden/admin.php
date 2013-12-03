<?php
/* @var $this EpisodenController */
/* @var $model Episoden */

$this->breadcrumbs=array(
	'Episodens'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Episoden', 'url'=>array('index')),
	array('label'=>'Create Episoden', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#episoden-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Episodens</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'episoden-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'NR_TOTAL',
		'NR_STAFFEL',
		'DEUTSCHER_TITEL',
		'ORIGINAL­TITEL',
		'ERSTAUS­STRAHLUNG_USA',
		'DEUTSCH­SPRACHIGE_ERSTAUS­STRAHLUNG­_D',
		/*
		'REGIE',
		'DREHBUCH',
		'US_QUOTEN',
		'INHALT',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

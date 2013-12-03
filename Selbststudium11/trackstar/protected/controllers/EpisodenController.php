<?php

class EpisodenController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','create','update','delete'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array(),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
            $episoden = Episoden::model()->find('NR_STAFFEL = :nr_staffel', array(':nr_staffel' => $id));
            echo CJSON::encode($episoden);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
            $json = file_get_contents('php://input'); 
            $jsonvars = CJSON::decode($json,true);
        
            $model = new Episoden;

            foreach($jsonvars as $var=>$value) {
                // Does model have this attribute? If not, raise an error
                if($model->hasAttribute($var)) {
                    $model->$var = $value;
                } else {
                    throw new CHttpException(500,'Invalid Element: ' . $var);
                }
            }

            if($model->save()) {
                echo CJSON::encode($model);
            } else {
                throw new CHttpException(500,'Konnte nicht gespeichert werden.');
            }

            $app = Yii::app;
            $app->end();
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
            $json = file_get_contents('php://input'); 
            $jsonvars = CJSON::decode($json,true);
        
            $model = Episoden::model()->find('NR_STAFFEL = :nr_staffel', array(':nr_staffel' => $id));                    

            foreach($jsonvars as $var=>$value) {
                // Does model have this attribute? If not, raise an error
                if($model->hasAttribute($var)) {
                    $model->$var = $value;
                } else {
                    $this->_sendResponse(500, sprintf('Parameter <b>%s</b> is not allowed for model <b>Episoden</b>', $var) );
                }
            }

            if($model->save()) {
                echo CJSON::encode($model);
            } else {
                throw new CHttpException(500,'Konnte nicht gespeichert werden.');
            }

            $app = Yii::app;
            $app->end();
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
            $model = Episoden::model()->find('NR_STAFFEL = :nr_staffel', array(':nr_staffel' => $id));                    
            if($model->delete()) {
                echo CJSON::encode(array('success' => 'true'));
            } else {
                throw new CHttpException(500,'Konnte nicht gespeichert werden.');
            }
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Episoden');
                echo CJSON::encode($dataProvider->getData());
                $app = Yii::app;
                $app->end();
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Episoden('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Episoden']))
			$model->attributes=$_GET['Episoden'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Episoden the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Episoden::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Episoden $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='episoden-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

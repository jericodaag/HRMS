<?php

class AccountController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('patient'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('createPatient', 'ListPatientSec','listPatient', 'CreateAdultPatientDoc', 'CreateChildPatientDoc'),
				'users'=>array('secretary'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('listPatient', 'ListPatientDoc', 'viewPatient', 'CreateAdultPatientDoc', 'CreateChildPatientDoc'),
				'users'=>array('doctor'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','createDoctor','updateDoctor','listDoctor','listPatient','CreateSecretary', 'ListSecretary',
				'updateSecretary', 'CreateChildPatientAdmin', 'UpdatePatient', 'CreateAdultPatientAdmin'),
				'users'=>array('super admin', 'admin'),
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionListDoctor()
	{
		$listOfAccounts = Account::model()->findAll(array(
			'condition'=>'account_type_id=:account_type_id',
			'params'=>array(
				':account_type_id'=>3,
			),
		));

		$this->render('listDoctor',array(
			'listOfAccounts'=>$listOfAccounts,
		));
	}

	public function actionListPatient()
	{
		$listOfAccounts = Account::model()->findAll(array(
			'condition'=>'account_type_id=:account_type_id',
			'params'=>array(
				':account_type_id'=>4,
			),
		));

		$this->render('listPatient',array(
			'listOfAccounts'=>$listOfAccounts,
		));
	}
	public function actionListPatientSec()
	{
		
		$listOfAccounts = Account::model()->findAll(array(
			'condition'=>'account_type_id=:id',
			'params'=>array(
				':id'=>4,
			),
		));
		$this->render('listPatientSec',array(
			'listOfAccounts'=>$listOfAccounts,
		));
	}
	public function actionListPatientDoc()
	{
		$id = Yii::app()->user->id;
		$listOfAccounts = ConsultationRecord::model()->with('doctorAccount')->findAll(array(
			'condition'=>'doctor_account_id=:id',
			'params'=>array(
				':id'=>$id,
			),
		));

		$this->render('listPatientDoc',array(
			'listOfAccounts'=>$listOfAccounts,
		));
	}

	

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreateDoctor()
	{
		$listOfAccounts = Account::model()->findAll(array(
			'condition'=>'account_type_id=:account_type_id',
			'params'=>array(
				':account_type_id'=>3,
			),
		));
		$account = new Account;
		$user = new User;
		$account->setScenario('createNewDoctor');
		$user->setScenario('createNewDoctor');

		
		if ((isset($_POST['Account'])) AND (isset($_POST['User'])))
		{
			$account->attributes = $_POST['Account'];
			$user->attributes = $_POST['User'];
			$account->account_type_id = 3;
			$valid = $account->validate();
			$valid = $user->validate() && $valid;
			
			if ($valid)
			{	
				$connection = Yii::app()->db;
				$transaction = $connection->beginTransaction();

				try
				{
					if ($account->save())
					{
						$account_id = $account->getPrimaryKey();
						$user->account_id = $account_id;

						if ($user->save(false))
						{
							$transaction->commit();
							Yii::app()->user->setFlash('success','You have successfully registered for an account!');
							$this->redirect(array('/account/listDoctor'));
						}
					}
				}
				catch (Exception $e)
				{
					$transaction->rollback();
					Yii::app()->user->setFlash('error', 'An error occured while trying to add an account! Please try again later');
					$this->redirect(array('/account/listDoctor'));
				}
			}
		}
		

		$this->render('create',array(
			'account' => $account,
			'user' => $user,
			'listOfAccounts' => $listOfAccounts,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdateDoctor($id)
	{
		$listOfAccounts = Account::model()->findAll(array(
			'condition'=>'account_type_id=:account_type_id',
			'params'=>array(
				':account_type_id'=>3,
			),
		));
		$account = $this->loadModel($id);
		$user = $account->user;
		$account->setScenario('updateDoctor');
		$user->setScenario('updateDoctor');

		if ((isset($_POST['Account'])) AND (isset($_POST['User'])))
		{
			$account->attributes = $_POST['Account'];
			$user->attributes = $_POST['User'];
			$account->account_type_id = 3;
			$valid = $account->validate();
			
			if ($valid)
			{	
				$connection = Yii::app()->db;
				$transaction = $connection->beginTransaction();

				try
				{
					if ($account->save())
					{
						if ($user->save(false))
						{
							$transaction->commit();
							Yii::app()->user->setFlash('success','You have successfully updated the account!');
							$this->redirect(array('/account/listDoctor'));
						}
					}
				}
				catch (Exception $e)
				{
					$transaction->rollback();
					Yii::app()->user->setFlash('error', 'An error occured while trying to update the account! Please try again later');
				}
			}
		}

		$this->render('update',array(
			'account' => $account,
			'user' => $user,
			'listOfAccounts' => $listOfAccounts,
		));
	}

	public function actionUpdateSecretary($id)
	{
		$listOfAccounts = Account::model()->findAll(array(
			'condition'=>'account_type_id=:account_type_id',
			'params'=>array(
				':account_type_id'=>5,
			),
		));
		$account = $this->loadModel($id);
		$user = $account->user;
		$account->setScenario('updateSecretary');
		$user->setScenario('updateSecretary');

		if ((isset($_POST['Account'])) AND (isset($_POST['User'])))
		{
			$account->attributes = $_POST['Account'];
			$user->attributes = $_POST['User'];
			$account->account_type_id = 5;
			$valid = $account->validate();
			
			if ($valid)
			{	
				$connection = Yii::app()->db;
				$transaction = $connection->beginTransaction();

				try
				{
					if ($account->save())
					{
						if ($user->save(false))
						{
							$transaction->commit();
							Yii::app()->user->setFlash('success','You have successfully updated the account!');
							$this->redirect(array('/account/listSecretary'));
						}
					}
				}
				catch (Exception $e)
				{
					$transaction->rollback();
					Yii::app()->user->setFlash('error', 'An error occured while trying to update the account! Please try again later');
				}
			}
		}

		$this->render('updateSec',array(
			'account' => $account,
			'user' => $user,
			'listOfAccounts' => $listOfAccounts,
		));
	}
	public function actionUpdatePatient($id)
	{
		$listOfAccounts = Account::model()->findAll(array(
			'condition'=>'account_type_id=:account_type_id',
			'params'=>array(
				':account_type_id'=>4,
			),
		));
		$account = $this->loadModel($id);
		$user = $account->user;
		$birthhistory = $account->birthHistory;
		$account->setScenario('updatePatient');
		$user->setScenario('updatePatient');

		if ((isset($_POST['Account'])) AND (isset($_POST['User'])) AND (isset($_POST['BirthHistory'])))
		{
			$account->attributes = $_POST['Account'];
			$user->attributes = $_POST['User'];
			foreach ($account->birthHistories as $index => $birthhistory) {
				$birthhistory->attributes = isset($_POST['BirthHistory'][$index]) ? $_POST['BirthHistory'][$index] : array();
			};
			$account->account_type_id = 4;
			$valid = $account->validate();
			
			if ($valid)
			{	
				$connection = Yii::app()->db;
				$transaction = $connection->beginTransaction();

				try
				{
					if ($account->save())
					{
						if ($user->save(false))
						{
							if ($birthhistory->save(false))
								{
								$transaction->commit();
								Yii::app()->user->setFlash('success','You have successfully updated the account!');
								$this->redirect(array('/account/listPatient'));
								}
						}
					}
				}
				catch (Exception $e)
				{
					$transaction->rollback();
					Yii::app()->user->setFlash('error', 'An error occured while trying to update the account! Please try again later');
				}
			}
		}

		$this->render('updatePat',array(
			'account' => $account,
			'user' => $user,
			'birthhistory' => $birthhistory,
			'listOfAccounts' => $listOfAccounts,
		));
	}

		

	public function actionCreateChildPatientDoc()
	{
		$id = Yii::app()->user->id;
		$listOfPatient = ConsultationRecord::model()->with('doctorAccount')->findAll(array(
			'condition'=>'doctor_account_id=:id',
			'params'=>array(
				':id'=>$id,
			),
		));
		$listOfAccounts = Account::model()->findAll(array(
			'condition'=>'account_type_id=:id',
			'params'=>array(
				':id'=>4,
			),
		));
		
		$account = new Account;
		$user = new User;
		$birthhistory = new BirthHistory;
		$account->setScenario('createNewPatient');
		$user->setScenario('createNewPatient');

		if ((isset($_POST['Account'])) AND (isset($_POST['User'])) AND (isset($_POST['BirthHistory'])))
		{
			$account->attributes = $_POST['Account'];
			$user->attributes = $_POST['User'];
			$birthhistory->attributes = $_POST['BirthHistory'];
			$account->account_type_id = 4;
			$valid = $account->validate();
			$valid = $user->validate() && $valid;
			
			if ($valid)
			{	
				$connection = Yii::app()->db;
				$transaction = $connection->beginTransaction();

				try
				{
					if ($account->save())
					{
						$account_id = $account->getPrimaryKey();
						$user->account_id = $account_id;
						$birthhistory->account_id = $account_id;
						if ($user->save(false))
						{
							if ($birthhistory->save(false))
							{
								$transaction->commit();
								Yii::app()->user->setFlash('success','You have successfully registered for an account!');
								$this->redirect(array('/account/listPatient'));
							}
						}
					}
				}
				catch (Exception $e)
				{
					$transaction->rollback();
					Yii::app()->user->setFlash('error', 'An error occured while trying to add an account! Please try again later');
					$this->redirect(array('/account/listPatient'));
				}
			}
		}
		
		if (Yii::app()->user->name == 'doctor'){
		$this->render('createChildPatient',array(
			'account' => $account,
			'user' => $user,
			'birthhistory' => $birthhistory,
			'listOfPatient' => $listOfPatient
		));
		} elseif (Yii::app()->user->name == 'secretary'){
			$this->render('createChildPatientSec',array(
				'account' => $account,
				'user' => $user,
				'birthhistory' => $birthhistory,
				'listOfAccounts' => $listOfAccounts
			));
		}
	}

	public function actionCreateAdultPatientDoc()
	{
		$id = Yii::app()->user->id;

		$listOfPatient = ConsultationRecord::model()->with('doctorAccount')->findAll(array(
			'condition'=>'doctor_account_id=:id',
			'params'=>array(
				':id'=>$id,
			),
		));

		$listOfAccounts = Account::model()->findAll(array(
			'condition'=>'account_type_id=:id',
			'params'=>array(
				':id'=>4,
			),
		));
		$account = new Account;
		$user = new User;
		$account->setScenario('createNewPatient');
		$user->setScenario('createNewPatient');

		if ((isset($_POST['Account'])) AND (isset($_POST['User'])))
		{
			$account->attributes = $_POST['Account'];
			$user->attributes = $_POST['User'];
			$account->account_type_id = 4;
			$valid = $account->validate();
			$valid = $user->validate() && $valid;
			
			if ($valid)
			{	
				$connection = Yii::app()->db;
				$transaction = $connection->beginTransaction();

				try
				{
					if ($account->save())
					{
						$account_id = $account->getPrimaryKey();
						$user->account_id = $account_id;
						if ($user->save(false))
						{
							$transaction->commit();
							Yii::app()->user->setFlash('success','You have successfully registered for an account!');
							$this->redirect(array('/account/listPatient'));
						}
					}
				}
				catch (Exception $e)
				{
					$transaction->rollback();
					Yii::app()->user->setFlash('error', 'An error occured while trying to add an account! Please try again later');
					$this->redirect(array('/account/listPatient'));
				}
			}
		}
		
		if (Yii::app()->user->name == 'doctor'){
		$this->render('createAdultPatient',array(
			'account' => $account,
			'user' => $user,
			'listOfPatient' => $listOfPatient
		));
		} elseif (Yii::app()->user->name == 'secretary'){
			$this->render('createAdultPatientSec',array(
				'account' => $account,
				'user' => $user,
				'listOfAccounts'=>$listOfAccounts
			));
		}
	}

	public function actionCreateChildPatientAdmin()
	{

		$listOfPatient = Account::model()->findAll(array(
			'condition'=>'account_type_id=:account_type_id',
			'params'=>array(
				':account_type_id'=>4,
			),
		));
		$account = new Account;
		$user = new User;
		$birthhistory = new BirthHistory;
		$account->setScenario('createNewPatient');
		$user->setScenario('createNewPatient');

		if ((isset($_POST['Account'])) AND (isset($_POST['User'])) AND (isset($_POST['BirthHistory'])))
		{
			$account->attributes = $_POST['Account'];
			$user->attributes = $_POST['User'];
			$birthhistory->attributes = $_POST['BirthHistory'];
			$account->account_type_id = 4;
			$valid = $account->validate();
			$valid = $user->validate() && $valid;
			
			if ($valid)
			{	
				$connection = Yii::app()->db;
				$transaction = $connection->beginTransaction();

				try
				{
					if ($account->save())
					{
						$account_id = $account->getPrimaryKey();
						$user->account_id = $account_id;
						$birthhistory->account_id = $account_id;
						if ($user->save(false))
						{
							if ($birthhistory->save(false))
							{
								$transaction->commit();
								Yii::app()->user->setFlash('success','You have successfully registered for an account!');
								$this->redirect(array('/account/listPatient'));
							}
						}
					}
				}
				catch (Exception $e)
				{
					$transaction->rollback();
					Yii::app()->user->setFlash('error', 'An error occured while trying to add an account! Please try again later');
					$this->redirect(array('/account/listPatient'));
				}
			}
		}
		

		$this->render('createChildPatientAdmin',array(
			'account' => $account,
			'user' => $user,
			'birthhistory' => $birthhistory,
			'listOfPatient' => $listOfPatient
		));
	}
	public function actionCreateAdultPatientAdmin()
	{

		$listOfPatient = Account::model()->findAll(array(
			'condition'=>'account_type_id=:account_type_id',
			'params'=>array(
				':account_type_id'=>4,
			),
		));
		$account = new Account;
		$user = new User;
		$account->setScenario('createNewPatient');
		$user->setScenario('createNewPatient');

		if ((isset($_POST['Account'])) AND (isset($_POST['User'])))
		{
			$account->attributes = $_POST['Account'];
			$user->attributes = $_POST['User'];
			$account->account_type_id = 4;
			$valid = $account->validate();
			$valid = $user->validate() && $valid;
			
			if ($valid)
			{	
				$connection = Yii::app()->db;
				$transaction = $connection->beginTransaction();

				try
				{
					if ($account->save())
					{
						$account_id = $account->getPrimaryKey();
						$user->account_id = $account_id;
						if ($user->save(false))
						{
							$transaction->commit();
							Yii::app()->user->setFlash('success','You have successfully registered for an account!');
							$this->redirect(array('/account/listPatient'));
							
						}
					}
				}
				catch (Exception $e)
				{
					$transaction->rollback();
					Yii::app()->user->setFlash('error', 'An error occured while trying to add an account! Please try again later');
					$this->redirect(array('/account/listPatient'));
				}
			}
		}
		

		$this->render('createAdultPatientAdmin',array(
			'account' => $account,
			'user' => $user,
			'listOfPatient' => $listOfPatient
		));
	}
	public function actionListSecretary()
    {
        $listOfAccounts = Account::model()->findAll(array(
            'condition'=>'account_type_id=:account_type_id',
            'params'=>array(
                ':account_type_id'=>5,
            ),
        ));

        $this->render('listSecretary',array(
            'listOfAccounts'=>$listOfAccounts,
        ));
    }

	
	public function actionCreateSecretary()
	{
		$listOfAccounts = Account::model()->findAll(array(
			'condition'=>'account_type_id=:account_type_id',
			'params'=>array(
				':account_type_id'=>5,
			),
		));
		$account = new Account;
		$user = new User;
		$account->setScenario('createNewSecretary');
		$user->setScenario('createNewSecretary');

		
		if ((isset($_POST['Account'])) AND (isset($_POST['User'])))
		{
			$account->attributes = $_POST['Account'];
			$user->attributes = $_POST['User'];
			$account->account_type_id = 5;
			$valid = $account->validate();
			$valid = $user->validate() && $valid;
			
			if ($valid)
			{	
				$connection = Yii::app()->db;
				$transaction = $connection->beginTransaction();

				try
				{
					if ($account->save())
					{
						$account_id = $account->getPrimaryKey();
						$user->account_id = $account_id;

						if ($user->save(false))
						{
							$transaction->commit();
							Yii::app()->user->setFlash('success','You have successfully registered for an account!');
							$this->redirect(array('/account/listSecretary'));
						}
					}
				}
				catch (Exception $e)
				{
					$transaction->rollback();
					Yii::app()->user->setFlash('error', 'An error occured while trying to add an account! Please try again later');
					$this->redirect(array('/account/listSecretary'));
				}
			}
		}
		

		$this->render('createSecretary',array(
			'account' => $account,
			'user' => $user,
			'listOfAccounts' => $listOfAccounts,
		));
	}


	
	
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Account');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Account('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Account']))
			$model->attributes=$_GET['Account'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Account the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Account::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Account $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='account-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

<?php

class BgtController extends Controller
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
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$user = User::model()->find('username=?',array(Yii::app()->user->name));
		$type_ID = $user->user_type_ID;
		$role_ID = $user->role_ID;
		if($type_ID == "1" || $type_ID=="3" || $role_ID  ="2" || $role_ID = "5"){
			$this->render('view',array(
				'model'=>$this->loadModel($id),
				));
		}else{
			
			echo "<script>alert('Sie sind nicht berechtigt, diese Aktion durchzuführen')</script>";
		}
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Bgt;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$user = User::model()->find('username=?',array(Yii::app()->user->name));
		$user_right_ID = $user->user_right_ID;
		$type_ID = $user->user_type_ID;

		/**
		*	The user_right_ID gives the user the possibility to read/write information in the database,
		*   if 2 then the user have read and write permission
		*
		*	The type_ID defines if it's BGT or IFT
		*/
		if($user_right_ID == "2" && ($type_ID=="1" || $type_ID=="3")){

			if(isset($_POST['Bgt']))
			{				
				$model->attributes=$_POST['Bgt'];
				$m_thematische = "";
				$m_projektpartner_industrie = "";
				$m_projektpartner_forschung = "";

				// store actual date-time of modification.
				date_default_timezone_set('Europe/Berlin');
				$model->letzte_aktualisierung = date('Y-m-d H:i:s')." Benutzer: ".$user->username;		

				//formatting of date into german date format.		
				$model->projektstart = User::date_convert($model->projektstart);
				$model->projektende = User::date_convert($model->projektende);
				$model->projekt_skizze = User::date_convert($model->projekt_skizze);
				$model->projekt_antrag = User::date_convert($model->projekt_antrag);

				//user that created the file
				$model->projektschöpfer = $user->user_ID;
				if($model->save())
					$this->redirect(array('view','id'=>$model->projekt_id));
			}

			$this->render('create',array(
				'model'=>$model,
				));
		}else{
			
			echo "<script>alert('Sie sind nicht berechtigt, diese Aktion durchzuführen')</script>";
		}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);


		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$user = User::model()->find('username=?',array(Yii::app()->user->name));
		$user_right_ID = $user->user_right_ID;
		$type_ID = $user->user_type_ID;
		$role_ID = $user->role_ID;
		$user_ID = $user->user_ID;

		/**
		*	The user_right_ID gives the user the possibility to read/write information in the database,
		*   if 2 then the user have read and write permission
		*
		*	The type_ID defines if it's BGT or IFT
		* 
		*	The role_ID defines the user function i.e. (Abteilungsleiter,Projektlieter,Ingenieur,F&E-Koordination or Vorstand)
		*/
		if($user_right_ID == "2" && ($type_ID=="1" || $type_ID=="3")){				
			$projekt = $model;	
			$projekt->attributes=Bgt::model()->find('projekt_id=?',array($id));
			if($projekt->vertreter == $user->user_ID){
				self::update($model,$user);
			}else if($role_ID == "4" && $user_ID == $model->projektschöpfer){
				self::update($model,$user);
			}else if($role_ID == "3" && $user_ID == $model->projekt_leiter){
				self::update($model,$user);				
			}else if($role_ID == "2" || $role_ID == "5"){
				self::update($model,$user);					
			}else{
				
				echo "<script>alert('Sie sind nicht berechtigt, diese Aktion durchzuführen')</script>";
			}
		}else{
			
			echo "<script>alert('Sie sind nicht berechtigt, diese Aktion durchzuführen')</script>";
		}
	}

	public function update($model,$user){
		$user_right_ID = $user->user_right_ID;
		if($user_right_ID == "2")
		{
			if(isset($_POST['Bgt']))
			{
				$model->attributes=$_POST['Bgt'];

				date_default_timezone_set('Europe/Berlin');
				$model->letzte_aktualisierung = date('Y/m/d H:i:s');
				$model->projektstart = User::date_convert($model->projektstart);
				$model->projektende = User::date_convert($model->projektende);
				$model->projekt_skizze = User::date_convert($model->projekt_skizze);
				$model->projekt_antrag = User::date_convert($model->projekt_antrag);	
				if($model->save())
					$this->redirect(array('view','id'=>$model->projekt_id));
			}

			$this->render('update',array(
				'model'=>$model,
				));
		}

	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$user = User::model()->find('username=?',array(Yii::app()->user->name));
		$user_right_ID = $user->user_right_ID;
		$type_ID = $user->user_type_ID;
		if($user_right_ID == "2"){
			$this->loadModel($id)->delete();
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}else{
			
			echo "<script>alert('Sie sind nicht berechtigt, diese Aktion durchzuführen')</script>";
		}

	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$username = Yii::app()->user->name;
		$user = User::model()->find('username=?',array(Yii::app()->user->name));
		$type_ID = $user->user_type_ID;
		$role_ID = $user->role_ID;

		/**
		*	The type_ID defines if it's BGT or IFT
		* 
		*	The role_ID defines the user function i.e. (Abteilungsleiter,Projektlieter,Ingenieur,F&E-Koordination or Vorstand)
		*/
		
		if($type_ID == "1" || $type_ID=="3" || $role_ID  ="2" || $role_ID = "5" || $role_ID = "6"){
			$dataProvider=new CActiveDataProvider('Bgt');
			$this->render('index',array(
				'dataProvider'=>$dataProvider,
				));
		}else{
			
			echo "<script>alert('Sie sind nicht berechtigt, diese Aktion durchzuführen')</script>";
		}		
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$user = User::model()->find('username=?',array(Yii::app()->user->name));
		$type_ID = $user->user_type_ID;
		$role_ID = $user->role_ID;

		/**
		*	The type_ID defines if it's BGT or IFT
		* 
		*	The role_ID defines the user function i.e. (Abteilungsleiter,Projektlieter,Ingenieur,F&E-Koordination or Vorstand)
		*/
		if($type_ID == "1" || $type_ID=="3" || $role_ID  ="2" || $role_ID = "5"){
			$model=new Bgt();			
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['Bgt'])){
				$model->attributes=$_GET['Bgt'];				
			}

			$this->render('admin',array(
				'model'=>$model,
				));
			
		}else{
			
			echo "<script>alert('Sie sind nicht berechtigt, diese Aktion durchzuführen')</script>";
		}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Bgt the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Bgt::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Bgt $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='bgt-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	// Pdf generator is called through url and the data is sent using POST

	public function actionPDF()
	{
		if(isset($_POST['selectedIDs']))
		{
			//call the library with UTF-8 enabled
			require('protected/extensions/fpdf181/tfpdf.php');

			//definition of our PDF file
			$pdf = new tFPDF();
			$pdf->SetFillColor(255,0,0);
			$pdf->SetDrawColor(0,0,0);
			$pdf->SetLineWidth(.2);
			$pdf->AddPage('L');
			$logo = "images/GWI_logo.jpg";
			$pdf->Image($logo,10,1,25,12,'JPG');
			$pdf->Ln();
			$pdf->SetY(15);
			$pdf->SetFont('Arial','',4);

			// definition of the column names 
			// Note: iconv is used to format in UTF-8 the column names
			$header = array(
				iconv('UTF-8', 'windows-1252','Projektname/-akronym'),
				iconv('UTF-8', 'windows-1252','Internenummer'),
				iconv('UTF-8', 'windows-1252','Projekttitel/-ziel            '), 
				iconv('UTF-8', 'windows-1252','Thematische Zuordnung'), 
				iconv('UTF-8', 'windows-1252','Projektskizze'),
				iconv('UTF-8', 'windows-1252','Projektantrag'),
				iconv('UTF-8', 'windows-1252','Aktueller Status'),
				iconv('UTF-8', 'windows-1252','Fördermittelgeber'),
				iconv('UTF-8', 'windows-1252','Kontakt Technisch'),
				iconv('UTF-8', 'windows-1252','Kontakt kaufmännisch'),
				iconv('UTF-8', 'windows-1252','Projektgesamtvolumen'),
				iconv('UTF-8', 'windows-1252','GWI-Anteil  '),
				iconv('UTF-8', 'windows-1252','Projektdauer'),
				iconv('UTF-8', 'windows-1252','Projektpartner Industrie'),
				iconv('UTF-8', 'windows-1252','Projektpartner Forschung'),
				iconv('UTF-8', 'windows-1252','Projektleiter')
				);

			$widths = array();

			// generation of the columns
			foreach ($header as $Col) {
				array_push($widths,strlen($Col));
				$pdf->SetFillColor(230,230,230);
				$pdf->Cell(strlen($Col),6,$Col,1,0,'C',true);
			}

			
			$pdf->Ln();
			$pdf->SetDrawColor(0,0,0);
			$pdf->SetWidths($widths);
			srand((double) microtime() * 1000000);
			//Catch the POST data
			$selected_ids=$_POST['selectedIDs'];	

			/* 
			*	The POST data contains the unique id of the selected project in the table
			*   with that Id's the generator search for the complete information of the project
			*   and generates the complete table with the project data
			*/
			if(isset($selected_ids)){
				for($i=0;$i<sizeof($selected_ids);$i++){
					$criteria = new CDbCriteria;
					$criteria->select='*';
					$criteria->condition='projekt_id='.$selected_ids[$i];
					$projekt_datei = BGT::model()->findAll($criteria)[0];
					$projekt_datei = BGT::formatter($projekt_datei);

					$fields = array(
						iconv('UTF-8', 'windows-1252',$projekt_datei->projekt_name),
						iconv('UTF-8', 'windows-1252',$projekt_datei->interne_nummer),
						iconv('UTF-8', 'windows-1252',$projekt_datei->projekt_titel),
						iconv('UTF-8', 'windows-1252',$projekt_datei->thematische),
						iconv('UTF-8', 'windows-1252',$projekt_datei->projekt_skizze),
						iconv('UTF-8', 'windows-1252',$projekt_datei->projekt_antrag),
						iconv('UTF-8', 'windows-1252',$projekt_datei->aktuellerstatus_id),
						iconv('UTF-8', 'windows-1252',$projekt_datei->fordermittelgeber_id),
						iconv('UTF-8', 'windows-1252',$projekt_datei->kontakt_technisch),
						iconv('UTF-8', 'windows-1252',$projekt_datei->kontakt_kaufmanisch),
						iconv('UTF-8', 'windows-1252',$projekt_datei->projektgesamtvolumen),
						iconv('UTF-8', 'windows-1252',$projekt_datei->gwi_anteil),
						iconv('UTF-8', 'windows-1252',$projekt_datei->projektdauer),
						iconv('UTF-8', 'windows-1252',$projekt_datei->projektpartner_industrie),
						iconv('UTF-8', 'windows-1252',$projekt_datei->projektpartner_forschung),
						iconv('UTF-8', 'windows-1252',$projekt_datei->projekt_leiter),
						);

					$pdf->Row($fields);
				}
			}
			$pdf->Output();
		}
	}
}

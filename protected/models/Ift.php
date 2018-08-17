<?php

/**
 * This is the model class for table "{{ift}}".
 *
 * The followings are the available columns in table '{{ift}}':
 * @property integer $projekt_id
 * @property string $projekt_titel
 * @property string $projekt_name
 * @property string $projekt_zuwendungsnummer
 * @property integer $projekt_leiter
 * @property string $thematische
 * @property string $projekt_skizze
 * @property string $projekt_antrag
 * @property string $aktuellerstatus_id
 * @property string $bemerkungen
 * @property string $fordermittelgeber_id
 * @property string $forderungsquote_gwi
 * @property string $projektgesamtvolumen
 * @property string $gwi_anteil
 * @property string $gwi_ko_finanzierung
 * @property string $projektpartner_industrie
 * @property string $pbg
 * @property string $pba
 * @property integer $projekttyp
 * @property string $projektdauer
 * @property string $projektstart
 * @property string $projektende
 * @property string $projekt_info
 * @property string $link_zur_abschlussbericht
 * @property string $link_zur_projekt_internetseite
 * @property string $projektpartner_forschung
 * @property string $letzte_aktualisierung
 * @property string $kontakt_technisch
 * @property string $kontakt_kaufmanisch
 * @property integer $projektschöpfer
 * @property integer $projektkostenabrechnung
 * @property integer $vertreter
 * @property string $interne_nummer
 *
 * The followings are the available model relations:
 * @property User $projektLeiter
 * @property ProjektTyp $projekttyp0
 * @property User $projektschöpfer0
 * @property User $vertreter0
 */
class Ift extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{ift}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('projekt_titel, projekt_name', 'required'),
			array('projekt_leiter, projekttyp, projektschöpfer, projektkostenabrechnung, vertreter', 'numerical', 'integerOnly'=>true),
			array('', 'length', 'max'=>3),
			array('projekt_titel, forderungsquote_gwi', 'length', 'max'=>200),
			array('projekt_zuwendungsnummer, projektgesamtvolumen, gwi_anteil, gwi_ko_finanzierung, projektpartner_industrie, pbg, pba, projektdauer, projektpartner_forschung, interne_nummer', 'length', 'max'=>45),
			array('kontakt_technisch, kontakt_kaufmanisch', 'length', 'max'=>250),
			array('thematische, projekt_skizze, projekt_antrag, aktuellerstatus_id, bemerkungen, fordermittelgeber_id, projektstart, projektende, projekt_info, link_zur_abschlussbericht, link_zur_projekt_internetseite, letzte_aktualisierung', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('projekt_id, projekt_titel, projekt_name, projekt_zuwendungsnummer, projekt_leiter, thematische, projekt_skizze, projekt_antrag, aktuellerstatus_id, bemerkungen, fordermittelgeber_id, forderungsquote_gwi, projektgesamtvolumen, gwi_anteil, gwi_ko_finanzierung, projektpartner_industrie, pbg, pba, projekttyp, projektdauer, projektstart, projektende, projekt_info, link_zur_abschlussbericht, link_zur_projekt_internetseite, projektpartner_forschung, letzte_aktualisierung, kontakt_technisch, kontakt_kaufmanisch, projektschöpfer, projektkostenabrechnung, vertreter, interne_nummer ', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'projektLeiter' => array(self::BELONGS_TO, 'User', 'projekt_leiter'),
			'projekttyp0' => array(self::BELONGS_TO, 'ProjektTyp', 'projekttyp'),
			'projektschöpfer0' => array(self::BELONGS_TO, 'User', 'projektschöpfer'),
			'vertreter0' => array(self::BELONGS_TO, 'User', 'vertreter'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'projekt_id' => 'Projekt Nr.',
			'projekt_titel' => 'Projekttitel /- ziel    ',
			'projekt_name' => 'Projektname /- akronym',
			'projekt_zuwendungsnummer' => 'Zuwendungs-Nr.',
			'projekt_leiter' => 'Projektleiter',
			'thematische' => 'Thematische Zuordnung',
			'projekt_skizze' => 'Datum-Projektskizze',
			'projekt_antrag' => 'Datum-Projektantrag',
			'aktuellerstatus_id' => 'Aktueller Status',
			'bemerkungen' => 'Bemerkungen',
			'fordermittelgeber_id' => 'Fördermittel-/Auftraggeber',
			'forderungsquote_gwi' => 'Förderquote GWI',
			'projektgesamtvolumen' => 'Projektgesamtvolumen',
			'gwi_anteil' => 'GWI-Anteil',
			'gwi_ko_finanzierung' => 'GWI-Ko-Finanzierung',
			'projektpartner_industrie' => 'Projektpartner Industrie',
			'pbg' => 'Pbg',
			'pba' => 'PbA',
			'projekttyp' => 'Projekttyp',
			'projektdauer' => 'Projektdauer',
			'projektstart' => 'Projektstart',
			'projektende' => 'Projektende',
			'projekt_info' => 'Projektinfo (Doc-Infodatei)',
			'link_zur_abschlussbericht' => 'Abschlussbericht',
			'link_zur_projekt_internetseite' => 'Projekt-Internetseite',
			'projektpartner_forschung' => 'Projektpartner Forschung',
			'letzte_aktualisierung' => 'Letzte Aktualisierung',
			'kontakt_technisch' => 'Kontakt techn. Ansprechpartner',
			'kontakt_kaufmanisch' => 'Kontakt kaufm. Ansprechpartner',
			'projektschöpfer' => 'Projektschöpfer',
			'projektkostenabrechnung' => 'Projektkostenabrechnung',
			'vertreter' => 'Vertreter',
			'interne_nummer' => 'Interne Nummer',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		
		if($this->thematische != NULL)
		{
			$thematische_exploded = explode(",", $this->thematische);
			if(sizeof($thematische_exploded) == 1){
				$criteria->compare('thematische',$this->thematische,true);
			} else{
				$counter = 0;
				$thematische__vergleichen = "";
				foreach ($thematische_exploded as $thematische) {
					$counter +=1;					
					if($counter == sizeof($thematische_exploded)) 
					{
						$thematische__vergleichen .= "thematische LIKE '%".$thematische."%' ";
					}else 
					{
						$thematische__vergleichen .= "thematische LIKE '%".$thematische."%' AND ";
					}
					
				}
				$criteria->condition = $thematische__vergleichen;
			}
		}

		if($this->fordermittelgeber_id != NULL)
		{
			$fordermittelgeber_exploded = explode(",", $this->fordermittelgeber_id);
			if(sizeof($fordermittelgeber_exploded) == 1){
				$criteria->compare('fordermittelgeber_id',$this->fordermittelgeber_id,true);
			} else{
				$counter = 0;
				$fordermittelgeber__vergleichen = "";
				foreach ($fordermittelgeber_exploded as $fordermittelgeber) {
					$counter +=1;					
					if($counter == sizeof($fordermittelgeber_exploded)) 
					{
						$fordermittelgeber__vergleichen .= "fordermittelgeber_id LIKE '%".$fordermittelgeber."%' ";
					}else 
					{
						$fordermittelgeber__vergleichen .= "fordermittelgeber_id LIKE '%".$fordermittelgeber."%' AND ";
					}
					
				}
				$criteria->condition = $fordermittelgeber__vergleichen;
			}
		}		
		
		$criteria->compare('projekt_titel',$this->projekt_titel,true);
		$criteria->compare('projekt_name',$this->projekt_name,true);
		$criteria->compare('projekt_zuwendungsnummer',$this->projekt_zuwendungsnummer,true);
		$criteria->compare('projekt_leiter',$this->projekt_leiter);
		$criteria->compare('thematische',$this->thematische,true);
		$criteria->compare('aktuellerstatus_id',$this->aktuellerstatus_id);
		$criteria->compare('interne_nummer',$this->interne_nummer);
		$criteria->compare('projekttyp',$this->projekttyp);

		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	public static function formatter($project_data){
		$fmt = new NumberFormatter( 'de_DE', NumberFormatter::CURRENCY );
					//search for projekttyp
		if($project_data->projekttyp != ""){
			$criteria = new CDbCriteria;
			$criteria->select='projekt_typ_name';
			$criteria->condition='pk_projekt_typ='.$project_data->projekttyp;
			$projekttyp = ProjektTyp::model()->findAll($criteria)[0]->projekt_typ_name;
			$project_data->projekttyp = $projekttyp;
		}



					//search for projektleiter
		if($project_data->projekt_leiter != ""){
			$criteria = new CDbCriteria;
			$criteria->select='username';
			$criteria->condition='user_ID='.$project_data->projekt_leiter;
			$projekt_leiter = User::model()->findAll($criteria)[0]->username;
			$project_data->projekt_leiter = $projekt_leiter;
		}

					//convert to german date format
		if($project_data->projektstart != ""){
			$project_data->projektstart = User::date_convert_german($project_data->projektstart);
		}

		if($project_data->projektende != ""){
			$project_data->projektende = User::date_convert_german($project_data->projektende);
		}

		if($project_data->projekt_skizze != ""){
			$project_data->projekt_skizze = User::date_convert_german($project_data->projekt_skizze);
		}

		if($project_data->projekt_antrag != ""){
			$project_data->projekt_antrag = User::date_convert_german($project_data->projekt_antrag);
		}

		if($project_data->letzte_aktualisierung != ""){
			$project_data->letzte_aktualisierung = User::datetime_convert_german($project_data->letzte_aktualisierung);
		}

		if($project_data->projektgesamtvolumen != ""){		
			$project_data->projektgesamtvolumen = $fmt->formatCurrency($project_data->projektgesamtvolumen, "EUR");
		}

		if($project_data->gwi_anteil != ""){		
			$project_data->gwi_anteil = $fmt->formatCurrency($project_data->gwi_anteil, "EUR");
		}

		if($project_data->gwi_ko_finanzierung != ""){		
			$project_data->gwi_ko_finanzierung = $fmt->formatCurrency($project_data->gwi_ko_finanzierung, "EUR");
		}

		return $project_data;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ift the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

<?php

/**
 * This is the model class for table "tbl_tasks".
 *
 * The followings are the available columns in table 'tbl_tasks':
 * @property integer $taskID
 * @property string $taskName
 * @property string $taskDesc
 * @property integer $taskStatusID
 *
 * The followings are the available model relations:
 * @property TblStatus $taskStatus
 * @property TblTasksLists[] $tblTasksLists
 */
class Task extends CActiveRecord
{
  public $status_search;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_tasks';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('taskName, taskDesc, taskStatusID', 'required'),
			array('taskStatusID', 'numerical', 'integerOnly'=>true),
			array('taskName', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('taskID, taskName, taskDesc, status_search', 'safe', 'on'=>'search'),
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
			'taskStatus' => array(self::BELONGS_TO, 'Status', 'taskStatusID'),
			'tblTasksLists' => array(self::HAS_MANY, 'TasksLists', 'taskID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'taskID' => 'Task',
			'taskName' => 'Task Name',
			'taskDesc' => 'Task Desc',
			'taskStatusID' => 'Task Status',
			'taskStatus.statusDesc' => 'Task Status',
			'status_search' => 'Task Status'
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
$criteria->with = array( 'taskStatus' );

		$criteria->compare('taskID',$this->taskID);
		$criteria->compare('taskName',$this->taskName,true);
		$criteria->compare('taskDesc',$this->taskDesc,true);
		//$criteria->compare('taskStatusID',$this->taskStatusID);
		$criteria->compare( 'taskStatus.statusDesc', $this->status_search, true );


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Task the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

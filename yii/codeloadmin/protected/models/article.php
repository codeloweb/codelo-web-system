<?php

/**
 * This is the model class for table "article".
 *
 * The followings are the available columns in table 'article':
 * @property integer $id
 * @property string $title
 * @property string $subtitle
 * @property string $content
 * @property integer $id_user_author
 * @property string $created_date
 * @property string $sources
 * @property string $thumbnail_img_path
 * @property integer $verified
 * @property integer $show_in_news
 */
class article extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'article';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, content, id_user_author, verified, show_in_news', 'required'),
			array('id_user_author, verified, show_in_news', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>500),
			array('subtitle, sources, thumbnail_img_path', 'length', 'max'=>200),
			array('uploaded_thumbnail_image_file', 'unsafe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, subtitle, content, id_user_author, created_date, sources, thumbnail_img_path, verified, show_in_news', 'safe', 'on'=>'search'),
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
			'author' => array(self::BELONGS_TO, 'User', 'id_user_author'),
			'carrousels' => array(self::HAS_MANY, 'carrousel', 'id_article'),
			'events' => array(self::HAS_MANY, 'event', 'id_article'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'title' => 'Title',
			'subtitle' => 'Subtitle',
			'content' => 'Content',
			'id_user_author' => 'Id User Author',
			'author' => 'Author',
			'created_date' => 'Created Date',
			'sources' => 'Sources',
			'thumbnail_img_path' => 'Thumbnail Img Path',
			'verified' => 'Verified',
			'show_in_news' => 'Show In News',
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
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);

		$criteria->compare('title',$this->title,true);

		$criteria->compare('subtitle',$this->subtitle,true);

		$criteria->compare('content',$this->content,true);

		$criteria->compare('id_user_author',$this->id_user_author);

		$criteria->compare('created_date',$this->created_date,true);

		$criteria->compare('sources',$this->sources,true);

		$criteria->compare('thumbnail_img_path',$this->thumbnail_img_path,true);

		$criteria->compare('verified',$this->verified);

		$criteria->compare('show_in_news',$this->show_in_news);

		return new CActiveDataProvider('article', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return article the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	function behaviors() {
		return array(
			'tags' => array(
				'class' => 'taggable.ETaggableBehavior',
				// Table where tags are stored
				'tagTable' => 'tag',
				// Tag table PK field
				'tagTablePk' => 'id',
				// Tag name field
				'tagTableName' => 'name',
				// Tag counter field
				// if null (default) does not write tag counts to DB
				'tagTableCount' => 'count',
				// Cross-table that stores tag-model connections.
				// By default it's your_model_tableTag
				'tagBindingTable' => 'article_tag',
				// Foreign key in cross-table.
				// By default it's your_model_tableId
				'modelTableFk' => 'article_id',
				// Tag binding table tag ID
				'tagBindingTableTagId' => 'tag_id',
				// Caching component ID. If false don't use cache.
				// Defaults to false.
				'cacheID' => 'cache',

				// Save nonexisting tags.
				// When false, throws exception when saving nonexisting tag.
				'createTagsAutomatically' => true,
			),
		);
	}
}
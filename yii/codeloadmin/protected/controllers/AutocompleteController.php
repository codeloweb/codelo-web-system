<?php

class AutocompleteController extends Controller
{
	public function actionTags(){
		$req = $_GET['term'];
		$arr = explode( ',', $req );
		$match = end(array_values($arr));
		$match = trim($match);

		if(!empty($match)){
			$tagCriteria = new CDbCriteria(array(
				'condition'=>"name LIKE :match",
				'params'=>array(':match'=>"$match%"),
				'limit'=>10
			));

			$tagsResultset = tag::model()->findAll($tagCriteria);

			$suggest=array();
			
			foreach ($tagsResultset as &$tagRes) {
				$suggest[]=$tagRes->name;
			}
			echo CJSON::encode($suggest);
		}
	}
}
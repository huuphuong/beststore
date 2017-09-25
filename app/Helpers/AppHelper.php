<?php
namespace App\Helpers;

class AppHelper
{
	public $optionStr = "<option value=''>Choose category</option>";

	public function recusive($data, $parent = 0, $string = '',$select=0)
	{
		foreach ( $data as $value ) {

			if ($value['parent_cat_id'] == $parent) {
				$id = $value["cat_id"];

				$name = $value["cat_name"];

				if($select != 0 && $select==$id){
					$this->optionStr .= "<option value='$id' selected='selected'>$string $name</option>";
				}else {
					$this->optionStr .= "<option value='$id'>$string $name</option>";
				}

				$this->recusive( $data, $id, $string . '----|', $select );
			}
		}

		return $this->optionStr;
	}


	public static function setColor($colors)
	{
		$colorArray = array();

		foreach ($colors AS $key => $color)
		{
			$colorArray[$color['color_code']] = $color['color_name'];
		}

		return json_encode($colorArray);
	}
} // End class
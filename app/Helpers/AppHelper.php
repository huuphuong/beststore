<?php

namespace App\Helpers;

use App\Models\Category;

class AppHelper
{
    public $optionStr = "<option value=''>Choose category</option>";
    public $tbodyString = '';

    /**
     * Đệ quy combo box
     * @param  [type]  $data   [description]
     * @param  integer $parent [description]
     * @param  string $string [description]
     * @param  integer $select [description]
     * @return [type]          [description]
     */
    public function recusive($data, $parent = 0, $string = '', $select = 0)
    {
        foreach ($data as $value) {

            if ($value['parent_cat_id'] == $parent) {
                $id = $value["cat_id"];

                $name = $value["cat_name"];

                if ($select != 0 && $select == $id) {
                    $this->optionStr .= "<option value='$id' selected>$string $name</option>";
                } else {
                    $this->optionStr .= "<option value='$id'>$string $name</option>";
                }

                $this->recusive($data, $id, $string . '----|', $select);
            }
        }

        return $this->optionStr;
    }


    /**
     * Đệ qua table
     * @param  [type]  $data   [description]
     * @param  integer $parent [description]
     * @param  string $string [description]
     * @param  integer $select [description]
     * @return [type]          [description]
     */
    public function recusiveTable($data, $parent = 0, $string = '', $select = 0)
    {
        foreach ($data as $value) {

            if ($value['parent_cat_id'] == $parent) {
                $id = $value["cat_id"];
                $name = $value["cat_name"];
                $display = $value['display'] == 1 ? '<span class="label label-success">Display</label>' : '<span class="label label-warning">None</label>';


                $this->tbodyString .= "
					<tr>
						<td>$id</td>
						<td>$string $name</td>
						<td>
					";
                $cat = Category::where('cat_id', $value['parent_cat_id'])->select('cat_name')->first();
                if ($cat) {
                    $this->tbodyString .= $string . '  ' . $cat->cat_name;
                }

                $this->tbodyString .= "</td>
						<td>{$value['cat_desc']}</td>
						<td>{$value['position']}</td>
						<td>$display</td>
						<td>{$value['updated_at']}</td>
						<td>
							<a href='" . url('/categories/edit/' . $id) . "'>Edit</a> | 
							<button class='btn btn-link p-0 m-0'> Delete</button> |
							<a href='" . url('/categories/detail/' . $id) . "'>Detail</a>
						</td>
					</tr>
				";


                $this->recusiveTable($data, $id, $string . '-----|', $select);
            }
        }

        return $this->tbodyString;
    }


    public static function setColor($colors)
    {
        $colorArray = array();

        foreach ($colors AS $key => $color) {
            $colorArray[$color['color_code']] = $color['color_name'];
        }

        return json_encode($colorArray);
    }


    public static function number($strNumber)
    {
        $strNumber = str_replace(',', '', $strNumber);
        return (int)$strNumber;
    }


    public static function convertArray($data)
    {
        return json_decode(json_encode($data), true);
    }


    public static function base64ImgToFile($assetPath, $requestFile) {
        if (!empty ($requestFile))
        {
            $imageName = uniqid() . '.jpg';
            $folder = public_path() . '/'. $assetPath;
            if (!is_dir($folder)) {
                mkdir($assetPath);
            }
            $path = public_path() . '/'. $assetPath. '/' . $imageName;
            $saveFile = file_put_contents($path, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $requestFile)));

            return asset($assetPath . '/' . $imageName);
        }
        
        return null;
    }
} // End class
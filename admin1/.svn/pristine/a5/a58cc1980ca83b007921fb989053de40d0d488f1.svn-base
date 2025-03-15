<?php

App::uses('File', 'Utility');

class FileBehavior extends ModelBehavior {

    public $modelName = '';

    function beforeSave(Model $Model) {
        $this->modelName = $Model->name;
        //looping over fields which have been uploaded
        foreach ($Model->data[$Model->alias] as $field => $value) {
            if (is_array($value)) {
                //now uploading
                if (isset($value['error']) && intval($value['error']) === 0 && file_exists($value['tmp_name'])) {
                    $cache_dir = strtolower($Model->alias);
                    $filehash_field = time();
                    $file_name = preg_replace(array('#[\\s-]+#', '#[^A-Za-z0-9\. -]+#'), array('.', ''), urldecode($value['name']));
                    $relpath = $cache_dir . DS . $filehash_field . '-' . $file_name;
//                    $fullpath = FILES . $relpath;
                    $fullpath = CDN . $relpath;
                    if (!file_exists($fullpath)) {
                        $tmp_name = $this->padImage($value);
                        copy($tmp_name, $fullpath);
//                        $this->saveInOtherDB($fullpath);
                        /*
                         * making thumbnail
                         * only for images
                         */

                        $path_parts = pathinfo($fullpath);
                        if (isset($path_parts['extension'])) {
                            $path_parts['extension'] = strtolower($path_parts['extension']);
                            if (in_array($path_parts['extension'], array('jpeg', 'jpg', 'gif', 'png', 'bmp'))) {
                                $this->create_thumbnail(array(
                                    array('width' => 40, 'height' => 40, 'fullpath' => $fullpath),
                                    array('width' => 160, 'height' => 160, 'fullpath' => $fullpath),
                                    array('width' => 240, 'height' => 240, 'fullpath' => $fullpath),
                                    array('width' => 512, 'height' => 512, 'fullpath' => $fullpath),
                                ));
                            }
                        }
                    }
                    unset($Model->data[$Model->alias][$field]);
                    $Model->data[$Model->alias][$field] = file_base_url() . str_replace(array('\\'), array('/'), $relpath);
                } else {
                    if(!isset( $this->map[$Model->alias])){
                         $this->map[$Model->alias] = 'not_available';
                    }
                    $Model->data[$Model->alias][$field] = '/img/' . $this->map[$Model->alias];
                }
            } else {
                
            }
        }
        return true;
    }

    //edit same in common helper
    private $fields = array('product_photo_1', 'profile_picture', 'product_photo_2', 'product_photo_3', 'product_photo_4', 'product_photo_5', 'file');
    private $map = array(
        'User' => 'no_user',
        'LatestNews' => 'not_available',
        'Department' => 'not_available',
        'Student' => 'not_available',
        'Topper' => 'not_available',
        'Faculty' => 'not_available',
        'Notice' => 'not_available',
        'About' => 'not_available',
        'Infrastructure' => 'not_available',
        'Rnd' => 'not_available',
        'Committee' => 'not_available',
        'Affiliation' => 'not_available',
    );

    /**
     * 
     * @param type $size array('wid','hei','imagepath')
     * @return type
     */
    //note: please do same changes in common helper
    public function create_thumbnail($sizes = array()) {
        if (empty($sizes)) {
            return;
        }
        if (!isset($sizes[0])) {
            $sizes = array($sizes);
        }
        foreach ($sizes as $key => $size) {
            $new_width = $size['width'];
            $new_height = $size['height'];
            $fullpath = $size['fullpath'];

            list($width, $height) = getimagesize($fullpath);
            $image_p = imagecreatetruecolor($new_width, $new_height);
            switch ($this->getFileExtension($fullpath)) {
                case "jpeg":
                case "jpg":
                    //checking if image is actually jpeg or not
                    if (exif_imagetype($fullpath) != IMAGETYPE_JPEG) {
                        //creating jpeg
                        $fullpath = $this->createImage($fullpath);
                    }
                    $image = imagecreatefromjpeg($fullpath);
                    break;
                case "gif":
                    $image = imagecreatefromgif($fullpath);
                    break;
                case "png":
                    $image = imagecreatefrompng($fullpath);
                    break;
            }

            imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            imagejpeg($image_p, $fullpath . '_' . $new_width . '.jpg', 80);
        }
    }

    function getFileExtension($fullpath) {
        $path_parts = pathinfo($fullpath);
        return strtolower($path_parts['extension']);
    }

    private function padImage($value = NULL) {
        $tmp_name = $value['tmp_name'];
        if (isset($value['type'])) {
            $extension = str_replace(array('image/', 'images/'), array('', ''), $value['type']);
        } else {
            $path_parts = pathinfo($tmp_name);
            $extension = strtolower($path_parts['extension']);
        }
        if (in_array($extension, array('jpeg', 'jpg', 'gif', 'png', 'bmp'))) {
            $img = imagecreatefromstring(file_get_contents($tmp_name));
            list($original_widht, $original_height) = getimagesize($tmp_name);
            //checking if diff is less tahn 100 then no resample
            if (abs(intval($original_widht) - (intval($original_height))) <= 100) {
                return $tmp_name;
            }
            //checking if w is max or h
            if ($original_widht > $original_height) {//widht
                $current_dim = 50 + $original_widht;
            } else {//height
                $current_dim = 50 + $original_height;
            }
            $dst_x = ($current_dim - $original_widht) / 2;
            $dst_y = ($current_dim - $original_height) / 2;

            $blank_img = imagecreatetruecolor($current_dim, $current_dim);
            $bgColor = imagecolorallocatealpha($blank_img, 255, 255, 255, 127);
            imagefill($blank_img, 0, 0, $bgColor);
            imagecopy($blank_img, $img, $dst_x, $dst_y, 0, 0, $original_widht, $original_height);
            imagejpeg($blank_img, $tmp_name, 100);

            return $tmp_name;
        } else {
            return $tmp_name;
        }
    }

    private function createImage($path = null, $type = 'jpeg', $new_width = null, $new_height = null) {
        if (!file_exists($path)) {
            return $path;
        }
        if (!is_writable($path)) {
            $path = FILES . md5(time()) . $this->getFileExtension($path);
        }
        $img = imagecreatefromstring(file_get_contents($path));
        list($original_widht, $original_height) = getimagesize($path);
        if (is_null($new_width)) {
            $new_width = $original_widht;
        }
        if (is_null($new_height)) {
            $new_height = $original_height;
        }
        $blank_img = imagecreatetruecolor($new_width, $new_height);
        $bgColor = imagecolorallocatealpha($blank_img, 255, 255, 255, 127);
        imagefill($blank_img, 0, 0, $bgColor);
        imagecopyresampled($blank_img, $img, 0, 0, 0, 0, $new_width, $new_height, $original_widht, $original_height);
        imagejpeg($blank_img, $path, 100);
        return $path;
    }

}

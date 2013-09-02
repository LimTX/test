<?php
/* SVN FILE: $Id: app_model.php 7296 2008-06-27 09:09:03Z gwoo $ */
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework <http://www.cakephp.org/>
 * Copyright 2005-2008, Cake Software Foundation, Inc.
 *								1785 E. Sahara Avenue, Suite 490-204
 *								Las Vegas, Nevada 89104
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright		Copyright 2005-2008, Cake Software Foundation, Inc.
 * @link				http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package			cake
 * @subpackage		cake.cake.libs.model
 * @since			CakePHP(tm) v 0.2.9
 * @version			$Revision: 7296 $
 * @modifiedby		$LastChangedBy: gwoo $
 * @lastmodified	$Date: 2008-06-27 02:09:03 -0700 (Fri, 27 Jun 2008) $
 * @license			http://www.opensource.org/licenses/mit-license.php The MIT License
 */
/**
 * Application model for Cake.
 *
 * This is a placeholder class.
 * Create the same file in app/app_model.php
 * Add your application-wide methods to the class, your models will inherit them.
 *
 * @package		cake
 * @subpackage	cake.cake.libs.model
 */
class AppModel extends Model {

	 function myGenerateList($conditions = null, $order = null, $limit = null, $keyPath = null, $valuePath = null, $separator = '') {
    if ($keyPath == null && $valuePath == null && $this->hasField($this->displayField)) {
      $fields = array($this->primaryKey, $this->displayField);
    } else {
      $fields = null;
    }
    $recursive = $this->recursive;
    $result = $this->findAll($conditions, $fields, $order, $limit);
    $this->recursive = $recursive;

    if(!$result) {
      return false;
    }

    if ($keyPath == null) {
      $keyPath = '{n}.' . $this->name . '.' . $this->primaryKey;
    }

    if ($valuePath == null) {
      $valuePath = '{n}.' . $this->name . '.' . $this->displayField;
    }

    // extract the keys as normal
    $keys = Set::extract($result, $keyPath);
   
   
    $finalVals = array();
   
    // explode the value path by our delimiter
    $tmpVals = explode('#', $valuePath);
   
    $i = 0;
    foreach($tmpVals as $tmpVal) {
      // extract the data for each path sibling
      $vals = Set::extract($result, $tmpVal);
     
      // and insert it at the appropriate position in our final value array
      // use the separator when we need to append the values
      foreach($vals as $key => $value) {
        if(!array_key_exists($key, $finalVals)) {
          $finalVals[$key] = $value;
        } else {
          $finalVals[$key] .= $separator.$value;
        }
      }
      $i++;
    }
       
   
    if (!empty($keys) && !empty($finalVals)) {
      $out = array();
      $return = array_combine($keys, $finalVals);
      return $return;
    }
    return null;
  }
			
}
?>
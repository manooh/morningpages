<?php defined('SYSPATH') or die('No direct script access.');class Model_File_Version extends ORM {		protected $_belongs_to = array(		'file' => array()	);		public $parent_key = 'file_id';		public function delete()	{		try		{			unlink($this->file->path.$this->filename);		}		catch(exception $e)		{			// 		}		return parent::delete();	}	}

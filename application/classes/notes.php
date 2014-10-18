<?php defined('SYSPATH') or die('No direct script access.');abstract class notes{		/**	 * Add a message to the "popnotes" session.	 * @param String Type of message.	 * @param String Message	 * @return void	 */	public static function add($type, $note)	{		$session = Session::instance();		$popnotes = $session -> get('popnotes');		if(!$popnotes)			$popnotes = array();		$content = Array('type' => $type, 'note' => $note);		$popnotes[] = $content;		$session -> set('popnotes', $popnotes);	}		public static function fetch()	{		$session = Session::instance();		$messages = $session -> get('popnotes');		$session -> delete('popnotes');		if(isset($messages) && !empty($messages))			return $messages;		return false;	}		public static function count()	{			}		// Alias'	public static function error($note, $redirect = false)	{		self::add('danger', $note);		if($redirect)		{			site::redirect($redirect);			die();		}	}	public static function success($note, $redirect = false)	{		self::add('success', $note);		if($redirect)		{			site::redirect($redirect);			die();		}	}	public static function info($note, $redirect = false)	{		self::add('info', $note);		if($redirect)		{			site::redirect($redirect);			die();		}	}	}
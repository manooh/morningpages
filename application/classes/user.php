<?php defined('SYSPATH') or die('No direct script access.');abstract class user {		public static function slug($uri = false)	{		//$slug = kohana::$config->load('user')->get('slug');		$slug = 'user';		if($uri)		{			$slug .= '/' . $uri;		}		return $slug;	}		public static function can_edit($post)	{		if(!user::logged())		{			return false;		}		if(user::logged('admin'))		{			return true;		}		if(user::get()->id == $post->user_id)		{			return true;		}		return false;	}		public static function create($data)	{		$user = ORM::factory('User');		$user->create_user($data, array(			'username',			'password',			'email'		));		$user->add_role('login');		$mail = mail::create('usercreated')			->to($user->email)			->tokenize(array('username' => $user->username))			->send();		user::login(arr::get($data, 'email', ''), arr::get($data, 'password', ''));	}		public static function reservednames()	{		return array(			'login',			'logout',			'signup',			'password',			'help',			'delete',			'options',			'password',			'index'		);	}		public static function randompass()	{		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";		$pass = array();		$alphaLength = strlen($alphabet) - 1;		for ($i = 0; $i < 8; $i++)		{		    $n = rand(0, $alphaLength);		    $pass[] = $alphabet[$n];		}		return implode($pass);	}		public static function redirect($to = '', $code = 302)	{		http::redirect(self::slug($to), $code);		die();	}		public static function update_stats($content, $page)	{		if(!user::logged())		{			return;		}		$user = self::get();		$yesterdayslug = date('Y-m-d', strtotime('-1 day',$user->timestamp()));		$todayslug = date('Y-m-d', $user->timestamp());		$yesterday = ORM::factory('Page')			->where('user_id','=',$user->id)			->where('day','=',$yesterdayslug)			->or_where('day','=',$todayslug)			->count_all();		if((bool)$yesterday)		{			$user->current_streak += 1;			if($user->current_streak > $user->longest_streak)			{				$user->longest_streak = $user->current_streak;			}		}		else		{			$user->current_streak = 1;		}		$words = explode(' ',$content);		$user->all_time_words += count($words);		$todayswords = $page->wordcount;		if($todayswords > $user->most_words)		{			notes::success('You have written more today than you ever have before! Good job!');			$user->most_words = $todayswords;		}		$user->save();	}		public static function logged($role = null)	{		return Auth_ORM::instance()->logged_in($role);	}		public static function url($uri = '', $protocol = NULL)	{		return URL::site(self::slug($uri), $protocol);	}		public static function get()	{		return Auth_ORM::instance()->get_user();	}		public static function force_login($user)	{		return Auth_ORM::instance()->force_login($user);	}		public static function login($username, $password, $remember = false)	{		return Auth_ORM::instance()->login($username, $password, $remember);	}		public static function logout()	{		return Auth_ORM::instance()->logout();	}	}
<?php defined('SYSPATH') or die('No direct script access.');

class Model_Page extends ORM {
	
	protected $_belongs_to = array(
		'user' => array()
	);
	
	protected $_sorting = array(
		'created' => 'DESC'
	);
	
	public function filters()
	{
		return array(
			'content' => array(
				array('trim'),
				//array('Security::xss_clean', array(':value')),
				array(array($this, 'encrypt_content'), array(':value')),
			)
		);
	}
	
	public function markdown($text)
	{
		return markdown::instance()->convert($text);
	}
	
	private function calculate_points()
	{
		$user = $this->user;
		$yesterday_slug = site::day_slug(strtotime('-1 day',$user->timestamp()));
		$two_days_ago_slug = site::day_slug(strtotime('-2 days',$user->timestamp()));
		$points = 0;
		
		if($this->wordcount >= 750)
		{
			$points = 2;
			$prevpages = $this->user->pages
				->where('type','=','page')
				->and_where_open()
				->where('day','=',$yesterday_slug)
				->or_where('day','=',$two_days_ago_slug)
				->and_where_close()
				->find_all();
			foreach($prevpages as $prev)
			{
				if($prev->wordcount >= 750)
				{
					$points += 2;
				}
				else if ($prev->wordcount >= 100)
				{
					$points += 1;
				}
			}
		}
		else if ($this->wordcount >= 100)
		{
			$points = 1;
			$yesterday = $user->pages
				->where('type','=','page')
				->and_where('day','=',$yesterday_slug)
				->find();
			if($yesterday->loaded())
			{
				if($yesterday->wordcount >= 750)
				{
					$points += 2;
				}
				else if ($yesterday->wordcount >= 100)
				{
					$points += 1;
				}
			}
		}
		
		return $points;
	}
	
	public function encrypt_content($content)
	{
		if($content == '') return $content;
		$enc = Encrypt::instance();
		return $enc->encode($content);
	}
	
	public function open()
	{
		return date('Ymd', user::get()->timestamp()) == date('Ymd', $this->created);
	}
	
	public function content()
	{
		$cont = $this->content;
		$cont = $this->decode($cont);
		$cont = $this->markdown($cont);
		$cont = Security::xss_clean($cont);
		return $cont;
	}
	
	public function rawcontent()
	{
		$cont = $this->content;
		$cont = $this->decode($cont);
		$cont = Security::xss_clean($cont);
		return $cont;
	}
	
	public function decode($content)
	{
		$enc = Encrypt::instance();
		return $enc->decode($content);
	}
	
	public function textarea_content()
	{
		$cont = self::content();
		$cont = str_ireplace(array('<br />','<br>','<br/>'), "\r", $cont);
		$cont = str_ireplace(array('<p>','</p>'),'',$cont);
		return trim($cont);
	}
	
	public function add_paragraphs($content)
	{
		$content = Security::xss_clean($content);
		/*$content = '<p>'.preg_replace(
			array("/([\n]{2,})/i", "/([\r\n]{3,})/i","/([^>])\n([^<])/i"),
			array("</p>\n<p>", "</p>\n<p>", '$1<br>$2'),
			trim($content)
		).'</p>';*/
		$content = nl2br($content);
		
		return $content;
	}
	
	public function verify_word_count($field, $value)
	{
		$numwords = str_word_count(strip_tags($value));
		return $numwords >= 1;
	}
	
	public function date()
	{
		if(!$this->day)
		{
			$this->day = site::day_slug();
		}
		$today = site::day_slug();
		if($today == $this->day)
		{
			return 'Today';
		}
		return $this->daystamp();
		
	}
	
	public function daystamp()
	{
		list($month, $day, $year) = explode('-',$this->day);
		$daystamp = mktime(0,0,0,$month,$day,$year);
		return date('F d, Y', $daystamp);
	}
    
    public function stopwords()
    {
        //return array('a', 'about', 'above', 'above', 'across', 'after', 'afterwards', 'again', 'against', 'all', 'almost', 'alone', 'along', 'already', 'also','although','always','am','among', 'amongst', 'amoungst', 'amount',  'an', 'and', 'another', 'any','anyhow','anyone','anything','anyway', 'anywhere', 'are', 'around', 'as',  'at', 'back','be','became', 'because','become','becomes', 'becoming', 'been', 'before', 'beforehand', 'behind', 'being', 'below', 'beside', 'besides', 'between', 'beyond', 'bill', 'both', 'bottom','but', 'by', 'call', 'can', 'cannot', 'cant', 'co', 'con', 'could', 'couldnt', 'cry', 'de', 'describe', 'detail', 'do', 'done', 'down', 'due', 'during', 'each', 'eg', 'eight', 'either', 'eleven','else', 'elsewhere', 'empty', 'enough', 'etc', 'even', 'ever', 'every', 'everyone', 'everything', 'everywhere', 'except', 'few', 'fifteen', 'fify', 'fill', 'find', 'fire', 'first', 'five', 'for', 'former', 'formerly', 'forty', 'found', 'four', 'from', 'front', 'full', 'further', 'get', 'give', 'go', 'had', 'has', 'hasnt', 'have', 'he', 'hence', 'her', 'here', 'hereafter', 'hereby', 'herein', 'hereupon', 'hers', 'herself', 'him', 'himself', 'his', 'how', 'however', 'hundred', 'ie', 'if', 'in', 'inc', 'indeed', 'interest', 'into', 'is', 'it', 'its', 'itself', 'keep', 'last', 'latter', 'latterly', 'least', 'less', 'ltd', 'made', 'many', 'may', 'me', 'meanwhile', 'might', 'mill', 'mine', 'more', 'moreover', 'most', 'mostly', 'move', 'much', 'must', 'my', 'myself', 'name', 'namely', 'neither', 'never', 'nevertheless', 'next', 'nine', 'no', 'nobody', 'none', 'noone', 'nor', 'not', 'nothing', 'now', 'nowhere', 'of', 'off', 'often', 'on', 'once', 'one', 'only', 'onto', 'or', 'other', 'others', 'otherwise', 'our', 'ours', 'ourselves', 'out', 'over', 'own','part', 'per', 'perhaps', 'please', 'put', 'rather', 're', 'same', 'see', 'seem', 'seemed', 'seeming', 'seems', 'serious', 'several', 'she', 'should', 'show', 'side', 'since', 'sincere', 'six', 'sixty', 'so', 'some', 'somehow', 'someone', 'something', 'sometime', 'sometimes', 'somewhere', 'still', 'such', 'system', 'take', 'ten', 'than', 'that', 'the', 'their', 'them', 'themselves', 'then', 'thence', 'there', 'thereafter', 'thereby', 'therefore', 'therein', 'thereupon', 'these', 'they', 'thickv', 'thin', 'third', 'this', 'those', 'though', 'three', 'through', 'throughout', 'thru', 'thus', 'to', 'together', 'too', 'top', 'toward', 'towards', 'twelve', 'twenty', 'two', 'un', 'under', 'until', 'up', 'upon', 'us', 'very', 'via', 'was', 'we', 'well', 'were', 'what', 'whatever', 'when', 'whence', 'whenever', 'where', 'whereafter', 'whereas', 'whereby', 'wherein', 'whereupon', 'wherever', 'whether', 'which', 'while', 'whither', 'who', 'whoever', 'whole', 'whom', 'whose', 'why', 'will', 'with', 'within', 'without', 'would', 'yet', 'you', 'your', 'yours', 'yourself', 'yourselves', 'the');
        //return array(' a ',' about ',' above ',' above ',' across ',' after ',' afterwards ',' again ',' against ',' all ',' almost ',' alone ',' along ',' already ',' also ',' although ',' always ',' am ',' among ',' amongst ',' amoungst ',' amount ',' an ',' and ',' another ',' any ',' anyhow ',' anyone ',' anything ',' anyway ',' anywhere ',' are ',' around ',' as ',' at ',' back ',' be ',' became ',' because ',' become ',' becomes ',' becoming ',' been ',' before ',' beforehand ',' behind ',' being ',' below ',' beside ',' besides ',' between ',' beyond ',' bill ',' both ',' bottom ',' but ',' by ',' call ',' can ',' cannot ',' cant ',' co ',' con ',' could ',' couldnt ',' cry ',' de ',' describe ',' detail ',' do ',' done ',' down ',' due ',' during ',' each ',' eg ',' eight ',' either ',' eleven ',' else ',' elsewhere ',' empty ',' enough ',' etc ',' even ',' ever ',' every ',' everyone ',' everything ',' everywhere ',' except ',' few ',' fifteen ',' fify ',' fill ',' find ',' fire ',' first ',' five ',' for ',' former ',' formerly ',' forty ',' found ',' four ',' from ',' front ',' full ',' further ',' get ',' give ',' go ',' had ',' has ',' hasnt ',' have ',' he ',' hence ',' her ',' here ',' hereafter ',' hereby ',' herein ',' hereupon ',' hers ',' herself ',' him ',' himself ',' his ',' how ',' however ',' hundred ',' ie ',' if ',' in ',' inc ',' indeed ',' interest ',' into ',' is ',' it ',' its ',' itself ',' keep ',' last ',' latter ',' latterly ',' least ',' less ',' ltd ',' made ',' many ',' may ',' me ',' meanwhile ',' might ',' mill ',' mine ',' more ',' moreover ',' most ',' mostly ',' move ',' much ',' must ',' my ',' myself ',' name ',' namely ',' neither ',' never ',' nevertheless ',' next ',' nine ',' no ',' nobody ',' none ',' noone ',' nor ',' not ',' nothing ',' now ',' nowhere ',' of ',' off ',' often ',' on ',' once ',' one ',' only ',' onto ',' or ',' other ',' others ',' otherwise ',' our ',' ours ',' ourselves ',' out ',' over ',' own ',' part ',' per ',' perhaps ',' please ',' put ',' rather ',' re ',' same ',' see ',' seem ',' seemed ',' seeming ',' seems ',' serious ',' several ',' she ',' should ',' show ',' side ',' since ',' sincere ',' six ',' sixty ',' so ',' some ',' somehow ',' someone ',' something ',' sometime ',' sometimes ',' somewhere ',' still ',' such ',' system ',' take ',' ten ',' than ',' that ',' the ',' their ',' them ',' themselves ',' then ',' thence ',' there ',' thereafter ',' thereby ',' therefore ',' therein ',' thereupon ',' these ',' they ',' thickv ',' thin ',' third ',' this ',' those ',' though ',' three ',' through ',' throughout ',' thru ',' thus ',' to ',' together ',' too ',' top ',' toward ',' towards ',' twelve ',' twenty ',' two ',' un ',' under ',' until ',' up ',' upon ',' us ',' very ',' via ',' was ',' we ',' well ',' were ',' what ',' whatever ',' when ',' whence ',' whenever ',' where ',' whereafter ',' whereas ',' whereby ',' wherein ',' whereupon ',' wherever ',' whether ',' which ',' while ',' whither ',' who ',' whoever ',' whole ',' whom ',' whose ',' why ',' will ',' with ',' within ',' without ',' would ',' yet ',' you ',' your ',' yours ',' yourself ',' yourselves ',' the ');
		if($this->user->option('language') == 0)
		{
			return array();
		}
        $stopword = ORM::factory('Stopword', $this->user->option('language'));
		$words = explode($stopword->delimiter,$stopword->words);
		return $words;
    }
	
	public function wordcloud($wordlimit = 30)
	{
		$content = $this->content();
		$content = strtolower($content);
		$content = strip_tags($content);
		
		$remove_signs = array('!','?',',','.', ':','-','"');
		$remove_words = $this->stopwords();
		$desc = str_ireplace($remove_signs,'',$content);
		$desc = str_replace($remove_words,' ',$desc);
		$descwords = explode(' ', $desc);
		$words = array();
		foreach($descwords as $w)
		{
			if(in_array($w, array_keys($words)) && isset($words[$w]))
			{
				$words[$w]++;
			}
			else
			{
				$words[$w] = 1;
			}
		}
		$html = '';
		$max = max($words);
		uasort($words, create_function('$a, $b', 'if($a == $b){return 0;}return ($a > $b) ? -1 : 1;'));
		$words = array_slice($words, 0, $wordlimit, true);
		$words = $this->shuffle_assoc($words);
		$classes = array('orange','red','brown','green', 'blue');
		$color = $classes[rand(0,count($classes)-1)];
		foreach($words as $word => $count)
		{
			$size = floor(50 * ($count / $max));
			if($size < 10)
			{
				$size = 10;
			}
			$prevcolor = $color;
			$color = $classes[rand(0,count($classes)-1)];
			while($color == $prevcolor)
			{
				$color = $classes[rand(0,count($classes)-1)];
			}
			$html .= '<span style="font-size:' . $size . 'px;" class="'.$color.'">'.$word.'</span> ';
		}
		return $html;
	}
	
	private function shuffle_assoc($list)
	{ 
		if (!is_array($list)) return $list;
		 
		$keys = array_keys($list); 
		shuffle($keys); 
		$random = array(); 
		foreach ($keys as $key)
		{ 
			$random[$key] = $list[$key]; 
		}
		return $random; 
	}
	
	/**
	 * obsolete
	 */
	public function wordcount()
	{
		throw new Exception('wordcount() is obsolete');
		$content = strip_tags($this->content);
        $replace = array("\r\n", "\n", "\r", "\t", '.', ',', ';', "'", '@');
        $content = str_replace($replace, ' ', $content);
        $count = str_word_count($content);
		return $count;
	}
	
	public function create(Validation $validation = NULL)
	{
		$user = user::get();
		$this->user_id = $user->id;
		$this->created = $user->timestamp();
		$this->day = user::get()->today_slug();
		
		return parent::create($validation);
	}
	
	public function autosave(Validation $validation = NULL)
	{
		if(!$this->loaded())
		{
			return parent::save($validation);
		}
		return parent::update($validation);
	}
	
	public function get_autosave()
	{
		// Cleanup - old autosaves
		$old_autosaves = ORM::factory('Page')
			->where('user_id','=',$this->user_id)
			->where('parent','!=',$this->id)
			->where('type','=','autosave')
			->find_all();
		if((bool)$old_autosaves->count())
		{
			foreach($old_autosaves as $old)
			{
				$old->delete();
			}
		}
		// Current autosave
		$autosave = ORM::factory('Page')
			->where('user_id','=',$this->user_id)
			->where('parent','=',$this->id)
			->where('type','=','autosave')
			->find();
		if($autosave->loaded())
		{
			if($autosave->content() == '')
			{
				$autosave->delete();
				return false;
			}
			return $autosave;
		}
		return false;
	}
	
	public function update(Validation $validation = NULL)
	{
		if(!$validation)
		{
			$validation = Validation::factory(array(
				'content' => $this->content,
				'user_id' => $this->user_id
			));
		}
		$validation
			->rule('user_id', 'not_empty')
			->rule('content', 'not_empty')
			->rule('content', array($this, 'verify_word_count'), array('content',':value'))
			->rule('content', 'max_length', array(':value', 100000));
		
		$this->points = $this->calculate_points();
		
		if($this->changed('content'))
		{
			$this->rid = ''; // resetting the RID as it needs to be recalculated when the page is updated
		}
		
		return parent::update($validation);
	}
	
	public function delete()
	{
		$autosave = ORM::factory('Page')->where('type','=','autosave')->where('parent','=',$this->id)->find();
		if($autosave->loaded())
		{
			$autosave->delete();
		}
		return parent::delete();
	}
	
}

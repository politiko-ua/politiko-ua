<?

class tag_helper
{
	public static $rss = '';

	public static function tag( $name, $options = array(), $block = false )
	{
		$options_html = self::get_options_html( $options );
		
		return "<{$name}{$options_html}" . ( $block ? "></{$name}>" : '/>' );
	}
	
	public static function get_options_html( $options )
	{
		$html = '';
		
		foreach ( $options as $option => $value )
		{
			$html .= ' ' . $option . '="' . htmlspecialchars($value) . '"';
		}
		
		return $html;
	}
	
	public static function image( $src, $options = array(), $server = null )
	{
		$options['src'] = self::image_path($src, $server);
		
		return self::tag( 'img', $options );
	}

	public static function image_path( $src, $server = null )
	{
		if ( $server == null )
		{
			$server = conf::get('subdomains-disabled') ? context::get('server') : context::get('static_server');
		}

		return $server . $src;
	}

	public static function select( $name, $data, $options = array() )
	{
		$options['name'] = $name;

		if ( !$options['use_values'] ) $options['use_values'] = false;

		$html = '<select ' . self::get_options_html($options) . '>';
		foreach ( $data as $key => $value )
		{
			$val = ( $options['use_values'] ? $value : $key );
			$html .= '<option value="' . htmlspecialchars($val) . '" ' . ( $val == $options['value'] ? 'selected' : '' ) . '>' . htmlspecialchars($value) . '</option>';
		}
		
		$html .= '</select>';

		return $html;
	}

    public static function wait_panel( $id = 'wait_panel', $options = array() )
	{
        $default_options = array('width' => 15, 'align' => 'absmiddle', 'class' => 'hidden ml10');
		$options['id'] = $id;

        $options = array_merge($options, $default_options);

        return tag_helper::image('common/loading.gif', $options);
	}
	
	public static function css( $src )
	{
		$src = $src . '?' . conf::get('static_hash', 1);
		$src = ( conf::get('subdomains-disabled') ? context::get('server') : context::get('static_server') ) . $src;

		$options = array(
			'href' => $src,
			'rel' => 'stylesheet',
			'type' => 'text/css'
		);
		
		return self::tag( 'link', $options );
	}
	
	public static function js( $src )
	{
		$src = $src . ( strpos($src, '?') !== false ? '&' : '?' ) . conf::get('static_hash', 1);
		$src = ( conf::get('subdomains-disabled') ? context::get('server') : context::get('static_server') ) . $src;

		$options = array(
			'src' => $src,
			'type' => 'text/javascript'
		);
		
		return self::tag( 'script', $options, true );
	}

	public static function rss()
	{
		if ( self::$rss )
		{
			$html = '<link rel="alternate" type="application/rss+xml" title="RSS" href="' . self::$rss . '">';
			return $html;
		}
	}
}
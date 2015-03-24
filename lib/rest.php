<?php 

class restCall {
	
	public function __construct($post) {

		$fw=Base::instance();
		$url = $fw->get('api_host');
		//curl -X POST --data '{"proc": "customer","request": {"cemail3": "jwsmen@gmail.com"}}' http://66.226.199.252/

		$options = array(
		    'method'  => 'POST',
		    'content' => $post,
		);

		$result = Web::instance()->request($url, $options);

		$json = json_decode($result['body'], true);

		$this->result = $this->filterEmptyArray($json);

	}

	 public static function filterEmptyArray(array &$a) {
        foreach ( $a as $k => &$v ) {
            if (empty($v))
                $a[$k] = "";
            else
                is_array($v);
        }

        return $a;
    }   
}

?>
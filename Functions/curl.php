<?php

class Curl
{
    /**
	 * @var resource The curl resource.
	 */
	private $ch;
	/**
	 * @var string The URL to request.
	 */
	private $url;

	/**
	 * @var string The result returned by the request.
	 */
	public $result;
        
        

        
        
        

	/**
	 * Constructor.
	 * 
	 * Optionally takes the URL to request.
	 *
	 * @param string $url The URL to request.
	 */
	public function  __construct($url = NULL)
	{
		$this->url = $url;
		$this->ch = curl_init($url);
		$this->result = NULL;

                
	}

	/**
	 * Destructor.  Closes the curl resource.
	 */
	public function  __destruct()
	{
		curl_close($this->ch);
	}

	/**
	 * Allows setting of curl options by setting object properties.
	 *
	 * @param int $name The curl option to set.
	 * @param mixed $value The value to set for the specified option.
	 * @return bool TRUE on success, FALSE on failure.
	 */
	public function  __set($name, $value)
	{
		if(is_array($value))
		{
			if(array_key_exists(CURLOPT_URL, $value))
			{
				$this->url = $value[CURLOPT_URL];
                                return curl_setopt_array($this->ch, $value);
			}
                        else
                        {
                                echo 'array';
                                exit;
                        }
			
		}
		else
		{
			if($name == CURLOPT_URL)
			{
				$this->url = $value;
                                return curl_setopt($this->ch, $name, $value);
			}
                        else
                        {
                                return curl_setopt($this->ch, $name, $value);
                        }
			
		}
	}

	/**
	 * Execute the curl call.
	 *
	 * @return bool|string TRUE on success or FALSE on failure. However, if the CURLOPT_RETURNTRANSFER  option is set, it will return the result on success, FALSE on failure.
	 */
	public function exec()
	{
		$this->result = curl_exec($this->ch);
		return $this->result;
	}

	/**
	 * Get the last curl error description.
	 *
	 * @return string The last curl error that occurred.
	 */
	public function error()
	{
		return curl_error($this->ch);
	}

	/**
	 * Get the last curl error number.
	 *
	 * @return int The last curl error number.
	 */
	public function errno()
	{
		return curl_errno($this->ch);
	}

	/**
	 * Get information about the last request.
	 *
	 * @return array An associative array containing information about the last request.
	 */
	public function info()
	{
		return curl_getinfo($this->ch);
	}

	/**
	 * Get a string suitable for debug logging.
	 *
	 * @return string A string suitable for debug logging.  Indicates success or failure, the URL requested, and the error number and message on failure.
	 */
	public function debug()
	{
		$errno = $this->errno();
		if($errno == 0)
		{
			return 'Curl success: ' . $this->url;
		}
		else
		{
			return 'Curl error (' . $errno . '):  ' . $this->url . "\n" . $this->error();
		}
	}

	public function call($url, $method="", $header=[], $body=[]){
		curl_setopt($this->ch, CURLOPT_URL, $url);
	    	curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
	    	if(strtolower($method) != "get")
	    	{
	    		curl_setopt($this->ch, CURLOPT_POST, true);
	    		curl_setopt($this->ch, CURLOPT_POSTFIELDS, $body);

	    	}
	        if(strtolower($method) == "put")
	        {
	   	 	curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, $customRequest);
		}
	    	curl_setopt($this->ch, CURLOPT_HTTPHEADER, $headers);
    	    	$response = curl_exec($ch);
	    	$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	    	curl_close($ch);

	   	if ($http_status !== 200) 
	    	{
	        	die(json_encode(["error" => "HTTP Status $http_status", "response" => $response]));
	    	}

    		return $response;
	}

	public function get($url, $headers = []) 
	{
	    curl_setopt($this->ch, CURLOPT_URL, $url);
	    curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($this->ch, CURLOPT_HTTPHEADER, $headers);
	    return curl_exec($this->ch);
	}

	public function post($url, $data, $headers = [], $customRequest="") 
	{
	    curl_setopt($this->ch, CURLOPT_URL, $url);
	    curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($this->ch, CURLOPT_POST, true);
	    curl_setopt($this->ch, CURLOPT_POSTFIELDS, $data);
	    if(!empty($customRequest))
	    {
	   	curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, $customRequest);
	    }
	    curl_setopt($this->ch, CURLOPT_HTTPHEADER, $headers);
	    return curl_exec($this->ch);
	}


}
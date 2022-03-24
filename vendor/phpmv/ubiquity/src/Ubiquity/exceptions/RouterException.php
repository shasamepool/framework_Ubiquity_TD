<?php
namespace Ubiquity\exceptions;

/**
 * Exceptions for Router
 * @author jc
 *
 */
class RouterException extends UbiquityException{
	public function __construct($message=null,$code=0,$previous=null){
		parent::__construct($message, $code, $previous);
	}
}

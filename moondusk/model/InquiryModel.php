<?php

Class InquiryModel {

	public $inqid = 0;
	public $name = '';
	public $email = '';
	public $subject = '';
	public $message = '';
	
	public $dbstatus = '';

	public function __construct($name = '', $email = '', $subject = '', $message = '') {
		$this->name = $name;
		$this->email = $email;
		$this->subject = $subject;
		$this->message = $message;
		
	}


}
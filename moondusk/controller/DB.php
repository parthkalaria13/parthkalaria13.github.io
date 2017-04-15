<?php

Class DB {
	
	public $db;
	public $table_inquiry = 'inquiry';
	public $table_slidshow = 'slidshow';
	public $table_product = 'product';
	
	public function __construct() {
		$this->db = new mysqli(Globals::get('mysql/host'), Globals::get('mysql/username'), Globals::get('mysql/password'), Globals::get('mysql/db'));
		
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}
	}
	
	public function addInquiry($inquiry ){
		
	
		$stmt = $this->db->prepare("INSERT INTO {$this->table_inquiry} (
		`inq_name` ,
		`inq_email` ,
		`inq_subject` ,
		`inq_message`
		)
		VALUES (?, ?, ?, ?)");
		
		$stmt->bind_param("ssss", 
				mysqli_real_escape_string($this->db, htmlentities($inquiry->name)), 
				mysqli_real_escape_string($this->db, htmlentities($inquiry->email)),
				mysqli_real_escape_string($this->db, htmlentities($inquiry->subject)),
				mysqli_real_escape_string($this->db, htmlentities($inquiry->message)));
		$result = $stmt->execute();
		
		if($result) {
			if ( $stmt->affected_rows > 0) {
				$stmt->close();
				
				$inquiry->inqid = $this->db->insert_id;
				$inquiry->dbstatus = 'sucess';
				return $inquiry;
			}
		}
		
		
		$error = $stmt->error;
		$stmt->close();
		$inquiry->dbstatus = 'fail';
		return $inquiry;
	}
	
}
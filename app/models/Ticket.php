<?php
	class Ticket extends Eloquent
	{
		protected $table="tickets";
		public $timestamps = [];
		public $fillable = ["location","destination","travelplan_id","user_id","created_at","updated_at",
							"ticket_id","transaction_id","simplepay_id"];
	}
?>
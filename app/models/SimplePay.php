<?php
	class SimplePay extends Eloquent]
	{
		protected $table="simple_pay";
		public $timestamps = [];
		public $fillable = ["created","captured","id","customer_address_postal","customer_address",			"customer_phone_number","customer_address_city","customer_email_address","customer_id",
			"customer_address_state","customer_address_country","payment_reference","currency",
			"response_code","source_exp_year","source_last4","source_brand","source_is_recurrent",
			"source_id","source_exp_month","funding","object"];
	}
?>
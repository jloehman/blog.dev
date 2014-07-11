<?php

//use when using carbon in multiple spaces
//use Carbon\Carbon;

class BaseModel extends Eloquent {
	
	public function getCreatedAtAttribute($value)
	{
	   
	    return $this->convertToLocalTimezone($value);
	}

	public function getUpdatedAtAttribute($value)
	{
		return $this->convertToLocalTimezone($value);
	}

	 public function convertToLocalTimezone($value)
	{
	 	$utc = Carbon\Carbon::createFromFormat($this->getDateFormat(), $value);
	    return $utc->setTimezone('America/Chicago');
	}

}


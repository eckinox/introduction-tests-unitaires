<?php

namespace App\Entity;

class Product
{
	public function __construct(
		public string $name,
		public string $sku,
		public float $price = 0.00,
	)
	{
	}

	public function __toString()
	{
		return $this->name . " (" . $this->sku . ")";
	}
}
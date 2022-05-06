<?php

namespace App\Repository;

use App\Entity\Product;

class ProductRepository
{
	/**
	 * @return array<int,Product>
	 */
	public function findAll(): array
	{
		// Assume this looks for products in the database...
		return [
			new Product("Chainsaw", "CHA-001", rand(0, 500)),
			new Product("Balloon", "BAL-001", rand(0, 500)),
			new Product("Horse", "HOR-001", rand(0, 500)),
		];
	}
}
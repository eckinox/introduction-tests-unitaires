<?php

namespace App\Catalog;

use App\Entity\Product;
use App\Repository\ProductRepository;

class ProductCatalog
{
	public function __construct(
		private ProductRepository $productRepository
	)
	{
	}

	/**
	 * @return array<int,Product>
	 */
	public function getMostExpensiveProducts(int $numberOfProducts = 3): array
	{
		$products = $this->productRepository->findAll();
		usort($products, function (Product $productA, Product $productB) {
			return $productA->price > $productB->price ? -1 : 1;
		});

		return array_slice($products, 0, $numberOfProducts);
	}
}
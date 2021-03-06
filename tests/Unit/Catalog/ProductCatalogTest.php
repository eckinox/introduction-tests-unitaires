<?php

namespace App\Tests\Unit\Catalog;

use App\Catalog\ProductCatalog;
use App\Entity\Product;
use App\Repository\ProductRepository;
use PHPUnit\Framework\TestCase;

class ProductCatalogTest extends TestCase
{
	public function testCatalogFetchesProductsFromRepository(): void
	{
		$productRepository = $this->createMock(ProductRepository::class);
		$productRepository->expects($this->once())
			->method("findAll");

		$catalog = new ProductCatalog($productRepository);
		$catalog->getMostExpensiveProducts();
	}

	public function testGetMostExpensiveProductsReallyReturnsTheMostExpensive(): void
	{
		$products = [
			new Product("Chainsaw", "CHA-001", 50),
			new Product("Balloon", "BAL-001", 0.05),
			new Product("Horse", "HOR-001", 5400),
			new Product("Horse 2", "HOR-002", 5300),
			new Product("Horse 3", "HOR-003", 1200),
			new Product("Horse 4", "HOR-004", 999999),
		];

		$productRepository = $this->createMock(ProductRepository::class);
		$productRepository->method("findAll")
			->willReturn($products);

		$catalog = new ProductCatalog($productRepository);
		$products = $catalog->getMostExpensiveProducts();
		$skus = array_map(fn (Product $product) => $product->sku, $products);

		$this->assertSame(["HOR-004", "HOR-001", "HOR-002"], $skus);
	}
}
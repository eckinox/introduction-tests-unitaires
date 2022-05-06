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
		$productRepository = new ProductRepository();
		$catalog = new ProductCatalog($productRepository);
		$products = $catalog->getMostExpensiveProducts();
		$skus = array_map(fn (Product $product) => $product->sku, $products);

		$this->assertSame(["CHA-001", "BAL-001", "HOR-001"], $skus);
	}
}
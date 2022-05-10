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
		$productRepository = $this->createStub(ProductRepository::class);
		$productRepository->method("findAll")
			->willReturn([
				new Product("Balloon (individual)", "BAL-0001", 0.05),
				new Product("Balloon (pack of 3)", "BAL-0003", 0.12),
				new Product("Balloon (pack of 12)", "BAL-0012", 0.45),
				new Product("Balloon (pack of 50)", "BAL-0050", 1.75),
				new Product("Balloon (pack of 250)", "BAL-0250", 2.50),
				new Product("Balloon (pack of 5000)", "BAL-5000", 15.00),
			]);

		$catalog = new ProductCatalog($productRepository);
		$products = $catalog->getMostExpensiveProducts();
		$skus = array_map(fn (Product $product) => $product->sku, $products);

		$this->assertSame(["BAL-5000", "BAL-0250", "BAL-0050"], $skus);
	}
}
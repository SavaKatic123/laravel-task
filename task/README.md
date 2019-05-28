# E-Shop Application with Laravel (medium)
You are tasked to make an e-shop application for your new client. Your colleague already implemented some of the functionalities but as he is sick you will have to help and finish it up to meet the deadline.

Required functionalities are:
* Creating new product
* Showing all products in a list
* Deleting product from a list of products
* Updating information about a product

You are expected to implement the following functionalities:
1. Add routes for CRUD-like operations on product.
Following routes should be added:
GET /products	index
GET	/products/create
POST	/products
GET	/products/{id}
GET	/products/{id}/edit
PUT/PATCH	/products/{id}
DELETE	/products/{id}

2. Implement CRUD operations in controller, service and repository for products.
3. Implement relationships between products and merchants.
4. Implement `ProductRequest` that will:
  1) Make `name`, `description`, and `price` fields required
  2) Make `price` field have to be numeric
  3) Make `status` field only contain its enum values
5. Finish .blade files for add, edit, list display and show product inside `/resources/views`

Hints: 
1. There is a migration bug that needs fixing.
2. Add middleware protection for product routes that will redirect user to login if user is not logged in.

The project contains unit and functional tests and your goal is to make sure they all pass by writing missing code.

For more details please run task inside devskiller and see failing tests.

## Setup
```
composer install
```

### Tests

```
composer test
```

## Good Luck!
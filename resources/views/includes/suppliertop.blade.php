<!DOCTYPE html>
<html>
<head>
<style>
.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
</head>
  <body>
  <a class="button" href="{{ route('suppliers.dashboard') }}">Dashboard</a>
    <a class="button" href="{{ route('products.list') }}">Stock</a>
    <a class="button" href="{{ route('products.insert') }}">Add Stock</a>
    <a class="button" href="{{ route('buyers.list') }}">Buyer List</a>
    <a class="button" href="{{ route('product.delivery') }}">Product Delivery</a>
  </body>
</html>
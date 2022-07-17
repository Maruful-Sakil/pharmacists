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
    <a class="button" href="{{route('home')}}">Home</a>
    <!-- <a class="button" href="{{route('about')}}">About</a> -->
    <a class="button" href="{{route('suppliers.register')}}">Registration</a>
    <a class="button" href="{{route('suplliers.login')}}">Login</a>

</body>
</html>
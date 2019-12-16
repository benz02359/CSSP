<!DOCTYPE html>
<html>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
 
form {
  border: 3px solid #f1f1f1;
  font-family: Arial;
}
 
.container {
  padding: 20px;
  background-color: #f1f1f1;
}
 
input[type=text], input[type=submit] {
  width: 100%;
  padding: 12px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
 
input[type=checkbox] {
  margin-top: 16px;
}
 
input[type=submit] {
  background-color: #4CAF50;
  color: white;
  border: none;
}
 
input[type=submit]:hover {
  opacity: 0.8;
}
</style>
<body>
 
<h2>CSS Newsletter</h2>
 
<form >
  <div class="container">
  <h2>สวัสดี {{$name}}</h2>
  <p>{{$body}}</p>
  <a href="http://localhost:8000">http://localhost:8000</a>
  </div>
 
</body>
</html>
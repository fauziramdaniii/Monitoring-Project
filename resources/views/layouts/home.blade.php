@extends('layouts.main')

@section('content')
<style>
   * {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  font-family: Arial, sans-serif;
  background-color: #f2f2f2;
}

.container {
  max-width: 960px;
  margin: 0 auto;
  padding: 24px;
}

.card-container {
  display: flex;
  justify-content: space-between;
  margin-top: 24px;
}

.card {
  background-color: #fff;
  border-radius: 6px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  width: 48%;
  transition: transform 0.2s ease-in-out;
}

.card:hover {
  transform: translateY(-6px);
}

.card-image {
  height: 200px;
  background-color: #ccc;
  overflow: hidden;
}

.card-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.card-content {
  padding: 24px;
}

.card-content h2 {
  font-size: 24px;
  margin-bottom: 12px;
}

.card-content p {
  font-size: 16px;
  line-height: 1.5;
  color: #333;
}
.card {
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  transition: transform 0.2s;
}

.card:hover {
  transform: translateY(-5px);
}

.card-link:hover {
  text-decoration: none;
  color: #007bff;
}
.card {
  position: relative;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  transition: transform 0.2s;
  cursor: pointer;
}

.card:hover {
  transform: translateY(-5px);
}

.card-link {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  display: block;
  z-index: 1;
}

.card-body {
  position: relative;
  z-index: 2;
}

</style>
<!DOCTYPE html>
<html>
  <head>
    <title>Home Page</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="container">
      <h1 style="text-align: center">Studi Kasus Arkamaya</h1>
      <div class="card-container" href="{{ route('projects.index') }}" class="card-link">
        <div class="card">
          <a href="{{ route('projects.index') }}" class="card-link"></a>
          <div class="card-content">
            <h2 style="text-align: center">Master Project</h2>
          </div>
          <div class="card-image">
            <img src="https://cdn-icons-png.flaticon.com/512/6886/6886480.png" style="max-width: 100%;">
          </div>
        </div>
        <div class="card">
          <a href="{{ route('clients.index') }}" class="card-link"></a>
          <div class="card-content">
            <h2 style="text-align: center">Master Client</h2>
          </div>
          <div class="card-image">
            <img src="https://cdn-icons-png.flaticon.com/512/1087/1087840.png" style="max-width: 100%;">
          </div>
        </div>
      </div>
    </div>
    <script src="script.js"></script>
  </body>
</html>
@endsection


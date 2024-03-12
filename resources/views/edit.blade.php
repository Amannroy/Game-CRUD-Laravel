<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Game Edit Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .card {
            background-color: #ffffff;
            margin: auto;
            width: 50%;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .alert-danger ul {
            margin: 0;
            padding-left: 20px;
        }
    </style>
</head>
<body>
    @extends('layout')
    @section('content')
    <div class="card uper">
        <div class="card-header">
            Edit Game Data
        </div>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div><br/>
            @endif
            <form method="post" action="{{route('games.update', $game->id)}}">
            <div class="form-group">
                @csrf
                @method('PATCH')
                <label for="name">Game Name:</label>
                <input type="text" class="form-control" name="name" value="{{$game->name}}"/>
            </div>
            <div class="form-group">
              <label for="price">Game Price:</label>
              <input type="text" class="form-control" name="price" value="{{$game->price}}"/>
            </div>
            <button type="submit" class="btn btn-primary">Update Data</button>
            </form>
        </div>
    </div>
    @endsection
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Game Main Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .uper {
            margin: 40px auto;
            width: 90%;
            max-width: 1200px;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .btn {
            display: inline-block;
            font-weight: 400;
            color: #212529;
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .btn-primary {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-danger {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 0.25rem;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        .create-button-container {
            text-align: right;
        }

        /* Add CSS for the h2 tag */
        h2 {
            font-size: 24px; /* Adjust the font size */
            color: #333; /* Adjust the color */
            text-align: center; /* Center align the text */
            margin-bottom: 20px; /* Add some space below the heading */
        }

    </style>
</head>
<body>
    @extends('layout')

    @section('content')
    <div class="uper">
     @if(session()->get('success'))
     <div class='alert alert-success'>
        {{session()->get('success')}}
     </div><br/>
     @endif
     <h2>Welcome to Games Home Page</h2>
     <form action="{{ route('games.index') }}" method="GET">
        <input type="text" name="search" placeholder="Search Here" value="{{ request()->get('search') }}">
        <button type="submit">Search</button>
    </form>
    
     <table class="table table-striped">
        <thead>
            <tr>
              <td>ID</td>
              <td>Game Name</td>
              <td>Game Price</td>
              <td colspan="2">Action</td>
            </tr>
        </thead>
        <div class="create-button-container">
            <a href="{{route('games.create')}}" class="btn btn-primary">Create</a> 
        </div>
        <tbody>
           @foreach($games as $game)
           <tr>
            <td>{{$game->id}}</td>
            <td>{{$game->name}}</td>
            <td>{{$game->price}}</td>
            <td><a href="{{route('games.edit', $game->id)}}" class="btn btn-primary">Edit</a></td>
           <td>
            <form action="{{ route('games.destroy', $game->id)}}" method="post">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
        </tbody>
    </table>
    </div>
    {{ $games->links() }}
    @endsection
</body>
</html>

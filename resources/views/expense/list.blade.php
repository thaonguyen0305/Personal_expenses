<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.0.0/mdb.min.css" rel="stylesheet" />
    <style>
        .table th {
            background-color: #e2e2e2;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header text-left py-3 mb-3">
                <h5 class="mb-0 text-left">
                    <strong>Expense List</strong>
                </h5>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <a href="{{route('create-expense')}}" class="btn btn-success">Add Expense</a>
                </div>
                <div class="col-6 text-right">
                    <strong>Total: {{$totalAmount}}</strong>
                </div>
            </div>
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category</th>
                        <th scope="col">Date</th>
                        <th scope="col">Amount</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($expenses as $key => $expense)
                    <tr>
                        <td scope="row">{{$key + 1}}</td>
                        <td>{{$expense->category}}</td>
                        <td>{{$expense->date}}</td>
                        <td>{{$expense->amount}}</td>
                        <td><a href="{{route('delete-expense', $expense->id) }}" class="btn btn-danger" data-mdb-ripple-init>Delete</a></td>
                        <td><a href="{{route('edit-expense',$expense->id)}}" class="btn btn-info" data-mdb-ripple-init>Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.0.0/mdb.umd.min.js"></script>

</html>

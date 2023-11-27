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
        .container {
            max-width: 30rem;
            margin-top: 20px;
        }

        form {
            width: 26rem;
            margin: 0 auto;
        }

        .mb-3 {
            margin-bottom: 1rem;
        }

        h6 {
            margin-bottom: 0.5rem;
        }

        textarea {
            resize: vertical;
        }

        button {
            margin-top: 1rem;
        }

        .button-container {
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header text-left py-3 mb-3">
                <h5 class="mb-0 text-left">
                    <strong>Add expense</strong>
                </h5>
            </div>
            <form method="POST" action="{{route('add-expense')}}" style="width: 26rem;">
                @csrf
                <div class="mb-3">
                    <h6>Category:</h6>
                    <select name="category" id="category" style="width: 100%;">
                        @foreach($categories as $category)
                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <h6>Date:</h6>
                    <div>
                        <input type="date" name="date" id="form3Example3c" class="form-control" />
                    </div>
                </div>
                <div>
                    <h6>Amount:</h6>
                    <div>
                        <input type="number" name="amount" id="form3Example3c" class="form-control" />
                    </div>
                </div>
                <div>
                    <h6>Note:</h6>
                    <div>
                        <textarea class="form-control" id="form4Example3" rows="4"></textarea>
                    </div>
                </div>
                <div class="button-container">
                    <a class="btn btn-tertiary" href="{{ route('show-list-expense') }}" data-mdb-ripple-init data-mdb-ripple-color="light">Cancel</a>
                    <button type="submit" class="btn btn-primary" data-mdb-ripple-init>Save</button>
                </div>
            </form>
        </div>
</body>
<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.0.0/mdb.umd.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        var currentDate = new Date().toISOString().split('T')[0];
        $('#expenseDate').val(currentDate);
        $('#expenseDate').attr('min', currentDate);
    });
</script>
</html>
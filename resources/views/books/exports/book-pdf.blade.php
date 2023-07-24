<!DOCTYPE html>
<html>
<title>Export Books to Pdf</title>

<head>
    <style>
        #books {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #books td,
        #books th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #books tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #books tr:hover {
            background-color: #ddd;
        }

        #books th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #257cff;
            color: #fff;
        }
    </style>
</head>

<body>

    <h1 style="text-align: center;">All Books Data</h1>

    <table id="books">
        <thead>
            <tr>
                <th style="text-align: center;">No.</th>
                <th>Title</th>
                <th>Category</th>
                <th style="text-align: center;">Quantity</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp

            @foreach ($books as $book)
                <tr>
                    <td style="text-align: center;">{{ $no++ }}.</td>
                    <td>{{ $book->book_title }}</td>
                    <td>{{ $book->category->name }}</td>
                    <td style="text-align: center;">{{ $book->book_quantity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>

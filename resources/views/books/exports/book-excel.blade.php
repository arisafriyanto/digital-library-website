<!DOCTYPE html>
<html>
<title>Export Books to Excel</title>

<body>

    <h3>All Books Data</h3>

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
                    <td style="width: 400px;">{{ $book->book_title }}</td>
                    <td style="width: 100px;">{{ $book->category->name }}</td>
                    <td style="text-align: center;">{{ $book->book_quantity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>

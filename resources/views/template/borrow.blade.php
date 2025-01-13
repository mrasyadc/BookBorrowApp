<!DOCTYPE html>
<html>
    <head>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th,
            td {
                border: 1px solid black;
                padding: 8px;
                text-align: left;
            }
        </style>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    @foreach ($headers as $header)
                        <th>{{ ucfirst(str_replace('_', ' ', $header)) }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $row)
                    <tr>
                        @foreach ($headers as $header)
                            <td>{{ $row[$header] ?? '-' }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Update CSRF Token</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f2f2f2;
            text-align: center;
            overflow: hidden;
        }
        .container {
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }
        p {
            font-size: 1.2em;
            margin-bottom: 20px;
        }
        button {
            padding: 10px 20px;
            font-size: 1em;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Update CSRF Token</h1>
        <p>Click the button below to refresh the CSRF token manually.</p>
        <button id="refreshCsrfTokenBtn">Refresh CSRF Token</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function refreshCsrfToken() {
            $.ajax({
                url: '{{ route('frontend.refresh_csrf') }}',
                type: 'GET',
                success: function(data) {
                    $('meta[name="csrf-token"]').attr('content', data.csrf_token);
                    alert('CSRF token refreshed!');
                },
                error: function() {
                    alert('Failed to refresh CSRF token.');
                }
            });
        }

        document.getElementById('refreshCsrfTokenBtn').addEventListener('click', refreshCsrfToken);

        // Automatically refresh CSRF token every 5 minutes
        setInterval(refreshCsrfToken, 5 * 60 * 1000); // 5 minutes in milliseconds
    </script>
</body>
</html>

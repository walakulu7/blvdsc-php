<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Forbidden</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            background: #f9fafb;
        }
        .error-container {
            text-align: center;
            padding: 2rem;
        }
        h1 {
            font-size: 6rem;
            color: #ef4444;
            margin: 0;
        }
        h2 {
            font-size: 1.5rem;
            color: #1f2937;
            margin: 1rem 0;
        }
        p {
            color: #6b7280;
            margin: 1rem 0 2rem;
        }
        a {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background: #3d2817;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.2s;
        }
        a:hover {
            background: #4d3421;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="error-container">
        <h1>403</h1>
        <h2>Access Forbidden</h2>
        <p>You don't have permission to access this resource.</p>
        <a href="/blvdsc-web-php/admin/dashboard">Go to Dashboard</a>
    </div>
</body>
</html>

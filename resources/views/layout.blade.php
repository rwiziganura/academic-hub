<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Academic Hub</title>
    
    <!-- Simple CSS for styling -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
        }
        
        /* Navbar styling */
        nav {
            background-color: #2c3e50;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        nav a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
        }
        
        nav a:hover {
            color: #3498db;
        }
        
        .brand {
            font-size: 24px;
            font-weight: bold;
            color: white;
        }
        
        .nav-links {
            display: flex;
            gap: 20px;
        }
        
        .logout-btn {
            background-color: #e74c3c;
            color: white;
            padding: 8px 15px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
            border-radius: 4px;
        }
        
        .logout-btn:hover {
            background-color: #c0392b;
        }
        
        /* Main content */
        main {
            max-width: 1000px;
            margin: 30px auto;
            padding: 20px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            min-height: 400px;
        }
        
        /* Footer */
        footer {
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 50px;
        }
        
        /* Alert messages */
        .alert {
            padding: 12px 15px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <!-- NAVBAR - Shows at top of every page -->
    <nav>
        <!-- App name on left -->
        <div class="brand">Academic Hub</div>
        
        <!-- Links on right -->
        <div class="nav-links">
            <!-- If user is NOT logged in, show Login and Register links -->
            @if(!Auth::check())
                <a href="/login">Login</a>
                <a href="/register">Register</a>
            @else
                <!-- If user IS logged in, show Welcome message and Logout button -->
                <span style="color: white;">Welcome, {{ Auth::user()->name }}</span>
                
                <!-- Logout form (must use POST with CSRF for security) -->
                <form action="/logout" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="logout-btn">Logout</button>
                </form>
            @endif
        </div>
    </nav>
    
    <!-- MAIN CONTENT - This changes based on which view uses this layout -->
    <main>
        @yield('content')
    </main>
    
    <!-- FOOTER - Shows at bottom of every page -->
    <footer>
        <p>&copy; 2026 Academic Hub. All rights reserved.</p>
    </footer>
</body>
</html>

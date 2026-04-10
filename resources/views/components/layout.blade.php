
@props(['title' => 'Academic Hub'])

<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }} - Academic Hub</title>
    <style>
        body {
            font-family: Arial;
            margin: 0;
            padding: 0;
        }
        
        nav {
            background-color: blue;
            color: white;
            padding: 10px 20px;
        }
        
        nav a {
            color: white;
            text-decoration: none;
            margin-right: 15px;
        }
        
        main {
            padding: 20px;
        }
        
        footer {
            background-color: gray;
            color: white;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- NAVBAR -->
    <nav>
        <h2 style="display: inline; margin-right: 50px;">Academic Hub</h2>
        
        @if(!Auth::check())
            <!-- Not logged in - show Login and Register -->
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        @else
            <!-- Logged in - left side links -->
            <a href="/">Dashboard</a>
            <a href="/students/create_student">Create Student</a>
            
            <!-- Right side - Welcome and Logout -->
            <span style="float: right;">
                <form action="/logout" method="POST" style="display: inline; margin-right: 15px;">
                    @csrf
                    <button type="submit" style="background-color: red; color: white; padding: 5px 10px; border: none; cursor: pointer;">Logout</button>
                </form>
                <span style="color: white;">Welcome, {{ Auth::user()->name }}</span>
            </span>
        @endif
    </nav>
    
    <main>
        {{ $slot }}
    </main>
    
 
    <footer>
        <p>&copy; 2026 Academic Hub. All rights reserved.</p>
    </footer>
</body>
</html>

<?php
session_start();

// ✅ already logged in
if(isset($_SESSION['admin'])){
    header("Location: dashboard.php");
    exit();
}

// ✅ error message
$error = $_GET['error'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login | NorthBound</title>
<style>
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
    body {
        background: linear-gradient(rgba(15, 23, 42, 0.8), rgba(15, 23, 42, 0.95)), 
                    url('https://images.unsplash.com/photo-1506461883276-594a12b11cf3?w=1600') center/cover fixed;
        display: flex; justify-content: center; align-items: center; height: 100vh;
    }
    .login-box {
        background: #ffffff; padding: 50px 40px; border-radius: 12px; width: 100%; max-width: 400px;
        box-shadow: 0 20px 50px rgba(0,0,0,0.5); text-align: center; animation: fadeInUp 0.6s ease-out forwards;
    }
    .login-box h2 { color: #0f172a; margin-bottom: 5px; font-size: 28px; font-weight: 800; }
    .login-box p { color: #64748b; margin-bottom: 30px; font-size: 15px; }
    
    .input-group { text-align: left; margin-bottom: 20px; }
    .input-group label { display: block; font-size: 13px; font-weight: 700; color: #0f172a; margin-bottom: 8px; text-transform: uppercase; letter-spacing: 0.5px; }
    input { width: 100%; padding: 14px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 15px; background: #f8fafc; transition: all 0.3s; outline: none; }
    input:focus { border-color: #f59e0b; background: #fff; box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.15); }
    
    button { width: 100%; padding: 15px; background: #0f172a; color: white; border: none; border-radius: 8px; font-size: 16px; font-weight: 700; cursor: pointer; transition: all 0.3s; margin-top: 10px; }
    button:hover { background: #f59e0b; color: #111; transform: translateY(-2px); box-shadow: 0 6px 15px rgba(245, 158, 11, 0.3); }

    .error-box { background: #fef2f2; color: #dc2626; padding: 12px 15px; border-left: 4px solid #ef4444; border-radius: 6px; margin-bottom: 20px; font-size: 14px; font-weight: 600; display: flex; align-items: center; gap: 10px; text-align: left; }
    @keyframes fadeInUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
</style>
</head>
<body>

<div class="login-box">
    <h2>NorthBound</h2>
    <p>Admin Control Panel</p>

    <?php if($error == "invalid"){ ?>
        <div class="error-box">
            <span>⚠️</span> Invalid username or password.
        </div>
    <?php } ?>

    <form action="login_process.php" method="POST">
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" placeholder="Admin Username" required>
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="••••••••" required>
        </div>
        <button type="submit">Secure Login</button>
    </form>
</div>

</body>
</html>
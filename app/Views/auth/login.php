<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Shift & Scheduling</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/login.css">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <!-- Left Box -->
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background-color: #3B4198;">
                <div class="featured-image mb-3">
                    <img src="/assets/images/full-logo.png" class="img-fluid" style="width: 250px;">
                </div>
                <p class="text-white fs-3" style="font-family:'Courier New', Courier, monospace; font-weight: 600;">
                    Hospital Management
                </p>
            </div>

            <!-- Right Box -->
            <div class="col-md-6 right-box">
                <form class="form" id="login" method="POST" action="/login">
                    <div class="row align-items-center">
                        <div class="header-text mb-4">
                            <h2>Shift & Scheduling</h2>
                        </div>

                        <!-- Email Error -->
                        <?php if (!empty($emailError)): ?>
                        <div class="alert alert-danger"><?php echo htmlspecialchars($emailError); ?></div>
                        <?php endif; ?>

                        <div class="input-group mb-3">
                            <input type="email" id="Email" name="Email" 
                                   value="<?php echo htmlspecialchars($email ?? ''); ?>" 
                                   class="form-control form-control-lg bg-light border-secondary fs-6" 
                                   placeholder="Email address" required>
                        </div>
                        
                        <!-- Password Error -->
                        <?php if (!empty($passwordError)): ?>
                        <div class="alert alert-danger"><?php echo htmlspecialchars($passwordError); ?></div>
                        <?php endif; ?>

                        <div class="input-group mb-1">
                            <input type="password" id="password" name="password" 
                                   class="form-control form-control-lg bg-light border-secondary fs-6" 
                                   placeholder="Password" required>
                        </div>

                        <div class="input-group mb-5 d-flex justify-content-between">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input border-secondary" id="formCheck">
                                <label for="formCheck" class="form-check-label text-secondary">
                                    <small>Remember Me</small>
                                </label>
                            </div>
                            <div class="forgot">
                                <small><a href="/forgot-password">Forgot Password?</a></small>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <button class="btn btn-lg w-100 fs-6 text-white" type="submit" 
                                    style="background-color: #213188;">
                                Login
                            </button>
                        </div>

                        <div class="row">
                            <small>Don't have an account? <a href="/signup">Sign Up</a></small>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
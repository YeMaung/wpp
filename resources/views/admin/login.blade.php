<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<form action="/admin/login" method="post">
		{{ csrf_field() }}
      <h1>Login Form</h1>
      <div>
        <input 
          type="text" 
          name="name" 
          class="form-control" 
          placeholder="User Name" 
          required="" />
      </div>
      <div>
        <input 
          type="password"
          name="password" 
          class="form-control" 
          placeholder="Password" 
          required="" />
      </div>
      <div>
        <button 
          type="submit" 
          class="btn btn-default submit">
          Log in
        </button>
        <a class="reset_pass" href="#">Lost your password?</a>
      </div>

      <div class="clearfix"></div>

      <div class="separator">
        <p class="change_link">New to site?
          <a href="#signup" class="to_register"> Create Account </a>
        </p>

        <div class="clearfix"></div>
        <br />

        <div>
          <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
          <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
        </div>
      </div>
    </form>
</body>
</html>
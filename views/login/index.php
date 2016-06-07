<div class="container">
    <form class="form-login" method="post" action="?controller=login&action=login">
        <h2 class="form-login-heading">Please login</h2>
        
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" name ="email" class="form-control" placeholder="Email address" required="" autofocus="">
        
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="">
        
        <div class="checkbox">
            <label>
            <input type="checkbox" name="rememberme"> Remember me
            </label>
        </div>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    </form>
</div>
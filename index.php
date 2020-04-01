<?php
 

include_once './common/connectDB.php';


include_once './common/cabecalho.php';


if(!empty($_GET['msg'])){
    echo "<script type='text/javascript'>alert('$_GET[msg]');</script>";
}
?>
<div class="text-center LoginPage">
    <div class="card">
        <article class="card-body">
            <a href="<?php echo $path?>/forms/formUtilizador.php" class="float-right btn btn-outline-primary">Sign up</a>
            <h4 class="card-title mb-4 mt-1">Login</h4>
            <form class="form-signin" action="login.php" method="POST" autocomplete="off">
                <div class="form-group">
                    <label class="sr-only" for="userN">Username</label>
                    <input class="form-control" type="text" id="userN" name="userN" placeholder="Username" required autofocus>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="pass">Password</label>
                    <input class="form-control" type="password" id="pass" name="pass" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit" name="submit">Login</button>
                </div>
            </form>
        </article>
    </div>
    </div>
    <?php include_once './common/rodape.php'; ?>
</body>
</html>


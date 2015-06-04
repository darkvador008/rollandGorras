<?php require "$racine/vue/header.php"; ?>  



<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">

                <div class="panel-heading panel-info text-center">Connectez-vous à l’Espace d'administration</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="post" action=<?php print("$nom_projet/index.php?page=_login"); ?>>

                        <div class="form-group">
                            <div class="col-sm-2">
                                <label for="inputEmail3" class="control-label" style="background:#00aacd;height:34px;color:#fff;width:34px;text-align:center !important"><i class="glyphicon glyphicon-user"></i></label>
                            </div>
                            <div class="col-sm-10">
                                <input class="form-control" id="" name="login" placeholder="Login" required="" >
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-2">
                                <label for="inputPassword3" class="control-label" style="background:#00aacd;height:34px;color:#fff;width:34px;text-align:center !important"><i class="glyphicon glyphicon-lock"></i></label>
                            </div>
                            <div class="col-sm-10">
                                <input class="form-control" id="" name="password" placeholder="Password" required="" type="password">
                            </div>
                        </div>



                        <div class="col-sm-10 col-sm-offset-2">
                            <div class="form-group last">
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-info btn-sm" name="adminLogin_btcLogin">S'identifier</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>







<?php require "$racine/vue/footer.php"; ?>  
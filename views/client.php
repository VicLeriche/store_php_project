<main>
    <div class="col-4 m-auto mt-5">
        <!-- Pills navs -->
        <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab"
                aria-controls="pills-login" aria-selected="true">Se connecter</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab"
                aria-controls="pills-register" aria-selected="false">S'incrire</a>
            </li>
        </ul>
        <!-- Pills navs -->

        <?php if(isset($_SESSION['message'])) { ?>
            <?php 
                $type = isset($_SESSION['message']['error']) ? 'error': 'success';
                $message = $_SESSION['message'][$type];
            ?>
            <div class="alert alert-<?=$type === 'error'?'danger':'success'?>"><?=$message?></div>
        <?php } ?>

        <!-- Pills content -->
        <div class="tab-content mb-5">
            <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                <form class="mt-5" action="controllers/signin.php" method="POST">
                    <!-- Email input -->
                    <div class="has-error"></div>

                    <div class="form-outline mb-4">
                        <input type="email" id="loginEmail" class="form-control" name="email"/>
                        <label class="form-label" for="loginEmail">Email</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="loginPassword" class="form-control" name="password" />
                        <label class="form-label" for="loginPassword">Mot de passe</label>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">Connexion</button>
                </form>
            </div>
            <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                <form class="mt-5" action="controllers/signup.php" method="POST">
                    <!-- Lastname input -->
                    <div class="has-error"></div>

                    <div class="form-outline mb-4">
                        <input type="text" id="registerLastname" class="form-control" name="lastname" />
                        <label class="form-label" for="registerLastname">Nom</label>
                    </div>

                    <!-- Firstname input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="registerFirstname" class="form-control" name="firstname" />
                        <label class="form-label" for="registerFirstname">Prénom</label>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="registerEmail" class="form-control" name="email" />
                        <label class="form-label" for="registerEmail">Email</label>
                    </div>

                     <!-- Phone input -->
                     <div class="form-outline mb-4">
                        <input type="text" id="registerPhone" class="form-control" name="phone" />
                        <label class="form-label" for="registerPhone">Téléphone</label>
                    </div>

                     <!-- Address input -->
                     <div class="form-outline mb-4">
                        <input type="text" id="registerAddress" class="form-control" name="address" />
                        <label class="form-label" for="registerAddress">Adresse</label>
                    </div>

                    <div class="row mb-4">
                        <div class="form-outline col-8">
                            <input type="text" id="registerCity" class="form-control" name="city" />
                            <label class="form-label" for="registerCity">Ville</label>
                        </div>
                        <div class="form-outline col-4">
                            <input type="number" id="registerCp" class="form-control" name="postal_code" />
                            <label class="form-label" for="registerCp">Code postal</label>
                        </div>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="registerPassword" class="form-control" name="password" />
                        <label class="form-label" for="registerPassword">Mot de passe</label>
                    </div>

                    <!-- Repeat Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="registerRepeatPassword" class="form-control" />
                        <label class="form-label" for="registerRepeatPassword">Confirmer mot de passe</label>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-3">Créer mon compte</button>
                </form>
            </div>
        </div>
        <!-- Pills content -->
    </div>
</main>
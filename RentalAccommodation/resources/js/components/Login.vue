<template>
    <div class="login-layout">
        <div class="container p-5">
            <div class="row d-flex justify-content-center align-items-center m-5">
                <div class="card shadow-3-strong m-4">
                    <h3 class="card-header d-flex border-0 color-light"> Log in</h3>
                    <div class="card-body text-center m-5">
                        <form action="#" @submit.prevent="" method="POST">
                            <div class="form-outline mb-4">
                                <label for="username" class="form-label">
                                    Name:
                                </label>
                                <br />
                                <input type="text" name="username"  class="form-control" />
                                <br />
                            </div>
                            <div class="form-outline mb-4">
                                <label for="password" class="form-label">
                                    Password:
                                </label>
                                <br />
                                <input type="password" name="password"  class="form-control" />
                                <br />
                            </div>

                            <div class="form-outline mb-4">
                                <a href="#"> Forgot password? </a>
                                <br />
                                <a href="#"> Create account </a>
                            </div>
                            <div class="mb-6">
                                <button type="submit" class="submit btn btn-primary text-uppercase fw-bold">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
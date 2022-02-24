<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/user-login.css">
    <title>Login</title>
    
</head>
<body>

    <main>
    <section class="login_signup_panel " id="active-panel-login">
        <div class="active_btn_ctn">

            <button class="action_btn" data-action="login">LOGIN</button>

        </div>
        <div class="form-panel">
            <div class="form-box" id="form_login_box">

                <form action="" >
                    <div class="input_item">

                        <label for="username">
                            USERNAME / Email
                        </label>
                        <input type="text" id="username" placeholder="Username" name="username">
                    </div>
                    
                    <div class="input_item">

                        <label for="password">
                            PASSWORD
                        </label>
                        <input type="password" id="password" placeholder="password" name="password">
                    </div>
                    <div class="input_item">

                        <button type="submit">LOGIN</button>
                    </div>
                    <div class="input_item">

                        <a href="">forgot password?</a>
                    </div>

                </form>

            </div>

        </div>
        
    </section>
    <section class="login_signup_panel active-panel" id="active-panel-signup">
        <div class="active_btn_ctn">

            <button class="action_btn"  data-action="signup">SIGN UP</button>

        </div>
        <div class="form-panel">

            <div class="form-box" id="form_signup_box">

                <form action="" >
                    <div class="input_item">

                        <label for="username">
                            USERNAME
                        </label>
                        <input type="text" id="username" placeholder="Username" name="username">
                    </div>
                    <div class="input_item">

                        <label for="email">
                            Email
                        </label>
                        <input type="email" id="email" placeholder="email" name="email">
                    </div>
                    <div class="input_item">

                        <label for="password">
                            PASSWORD
                        </label>
                        <input type="password" id="password" placeholder="password" name="password">
                    </div>
                    <div class="input_item">

                        <button type="submit">SIGN UP</button>
                    </div>

                

                </form>

            </div>

        </div>

    </section>

    </main>
    
</body>
<script>
    let action_btn = document.querySelectorAll('.action_btn'),
    form_panel = document.querySelectorAll('.login_signup_panel'),
    action = "login";

    const clearCurrentState = () => {
        form_panel.forEach(elem => {
            elem.classList.remove('active-panel');
        })
    }

    action_btn.forEach(element => {
        element.addEventListener('click', () => {
            action = element.getAttribute('data-action');
            clearCurrentState();
            let targetPanel = document.querySelector('#active-panel-'+action);
            targetPanel.classList.add('active-panel');
            document.querySelector('title').innerHTML =  action.toUpperCase();
            
        })
    });


</script>
</html>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('css/login_style.css') ?>">

<style>

    body, html {
        height: 100%;
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }

    .bg-blur {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('Images/Indonesia.jpg') no-repeat center center;
        background-size: cover;
        filter: blur(15px);
        z-index: -1;
    }


    .login-card {
        position: relative;
        max-width: 400px;
        width: 90%;
        margin: auto;
        top: 50%;
        transform: translateY(-50%);
        padding: 30px;
        background-color: rgba(255,255,255,0.9);
        border-radius: 12px;
        box-shadow: 0 8px 16px rgba(0,0,0,0.3);
    }

    label {
        font-weight: bold;
    }

    @media (max-width: 576px) {
        .login-card {
            padding: 20px;
        }
    }
</style>

<!-- Blur background -->
<div class="bg-blur"></div>

<div class="login-card">
    <form action ="<?= base_url("auth")  ?>"  method="post" id="submit_button">
        <label>USERNAME</label>
        <input type="text" class="form-control" name="user" id="user_acuy">
        <label>Password</label>
        <input type="password" class="form-control" name="password" id="password_acuy">

        <button class="btn btn-dark mt-3">Submit</button>
    </form>
</div>

<script>
    document.getElementById("submit_button").addEventListener("submit",function(){
        if(document.getElementById("user_acuy").value == "" && document.getElementById("password_acuy").value == "" ){
            alert("harap password dan username di isi");
        }
    });
</script>
`

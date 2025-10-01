<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="<?= base_url('css/login_style.css') ?>">


<div class="login-card">
    <form action ="<?= base_url("auth")  ?>"  method="post" id="submit_button">
        <label>USERNAME</label>
        <input type="text" class="form-control" name="user" id="user_acuy">
        <label>Password</label>
        <input type="password" class="form-control" name="password" id="password_acuy">

        <button class="btn btn-dark mt-3" >Submit</button>
    </form>
</div>

<script>
    document.getElementById("submit_button").addEventListener("submit",function(){

        if(document.getElementById("user_acuy").value == "" && document.getElementById("password_acuy").value == "" ){
            alert("harap password dan username di isi");
        }
    }
    );
</script>
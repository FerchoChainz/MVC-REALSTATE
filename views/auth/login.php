 <main class="container section centered-content">
     <h1>Login</h1>

     <?php foreach ($errors as $error): ?>
         <div class="alert error">
             <?php echo $error; ?>
         </div>
     <?php endforeach; ?>

     <form method="POST" class="form" novalidate>
         <fieldset>
             <legend>Email & Password</legend>

             <label for="email">E-mail</label>
             <input type="email" name="email" placeholder="Your email" id="email" novalidate>

             <label for="password">Password</label>
             <input type="password" name="password" id="password" placeholder="Your password">
         </fieldset>


         <input type="submit" value="Login" class="button green-btn">
     </form>
 </main>
<main class="container section">
    <h1>Formulario de contacto</h1>

    <?php if($message){ ?>
        <p class="alert succes"><?php echo $message; ?></p>
    <?php } ?>

    <picture>
        <source srcset="build/img/destacada3.webp" type="webp">
        <source srcset="build/img/destacada3.jpg" type="jpeg">

        <img src="build/img/destacada3.jpg" alt="Imagen contacto">
    </picture>

    <h2>Llene el formulario de contacto</h2>

    <form action="/contact" method="POST" class="form">
        <fieldset>
            <legend>Informacion personal</legend>

            <label for="name">Nombre</label>
            <input type="text" placeholder="Tu nombre" id="name" name="contact[name]" >
            
            <label for="message">Mensaje</label>
            <textarea id="message" name="contact[message]"></textarea>
        </fieldset>

        <fieldset>
            <legend>Informacion sobre la propiedad</legend>

            <label for="options">Vende o Compra</label>
            <select id="options" name="contact[type]" >
                <option value="" disabled selected>-- Seleccione --</option>
                <option value="buy">Compra</option>
                <option value="sell">Vende</option>
            </select>

            <label for="budget">Presupuesto</label>
            <input type="number" placeholder="Tu presupuesto" id="budget" name="contact[budget]" >
        </fieldset>

        <fieldset>
            <legend>Contacto</legend>

            <p>¿Como desea ser contactado?</p>

            <div class="contact-form">
                <label for="contact-phone">Telefono</label>
                <input type="radio" id="contact-phone" value="phone" name="contact[contact]">

                <label for="contact-mail">Correo</label>
                <input type="radio" id="contact-mail" value="email" name="contact[contact]">
            </div>

            <div id="contact"></div>

            
        </fieldset>


        <input type="submit" value="send" class="green-btn">
    </form>
</main>
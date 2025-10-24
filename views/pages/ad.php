<main class="container section centered-content">
  <h1><?php echo $property->tittle; ?></h1>

  <img src="/images/<?php echo $property->image; ?>" alt="Imagen destacada" loading="lazy">


  <div class="property-summary">
    <p class="price"><?php echo currency($property->price); ?></p>
    <ul class="icons-specifics">
      <li>
        <img loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
        <p><?php echo $property->wc; ?></p>
      </li>
      <li>
        <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionaminto">
        <p><?php echo $property->parking; ?></p>
      </li>
      <li>
        <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
        <p><?php echo $property->rooms; ?></p>
      </li>
    </ul>

    <p> <?php echo $property->description; ?></p>
  </div>
</main>
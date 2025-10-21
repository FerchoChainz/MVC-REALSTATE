<fieldset>
    <legend>General Info</legend>

    <label for="tittle">Tittle:</label>
    <input type="text" id="tittle" name="property[tittle]" placeholder="Propertie tittle"
        value="<?php echo s($property->tittle); ?>">

    <label for="price">Price:</label>
    <input type="number" id="price" name="property[price]" placeholder="Propertie price"
        value="<?php echo s($property->price); ?>">

    <label for="image">Image:</label>
    <input type="file" id="image" name="property[image]" accept="image/jpeg, image/png">

    <?php if ($property->image): ?>
        <img src="/images/<?php echo $property->image ?>" alt="" class="small-img">
    <?php endif; ?>

    <label for="description">Description:</label>
    <textarea id="description" name="property[description]"><?php echo s($property->description); ?></textarea>
</fieldset>

<fieldset>
    <legend>Propertie Info</legend>
    <label for="rooms">Rooms:</label>
    <input type="number" name="property[rooms]" id="rooms" min="1" placeholder="Example: 3"
        value="<?php echo s($property->rooms); ?>">

    <label for="wc">Bathrooms:</label>
    <input type="number" name="property[wc]" id="wc" min="1" placeholder="Example: 3"
        value="<?php echo s($property->wc); ?>">

    <label for="parking">Parking Lot:</label>
    <input type="number" name="property[parking]" id="parking" min="1" placeholder="Example: 3"
        value="<?php echo s($property->parking); ?>">
</fieldset>

<fieldset>
    <legend>Seller</legend>
        <label for="seller">Seller</label>
        <select name="property[sellers_id]" id="seller">
            <option value="selected value">--Select one seller--</option>

            <?php foreach($sellers as $seller){ ?>
                <option
                <?php echo $property->sellers_id === $seller->id ? 'Selected' : ''; ?>
                value="<?php echo s($seller->id); ?>"><?php echo s($seller->name) . " " . s($seller->last_name); ?></option>
                <?php } ?>

        </select>

</fieldset>
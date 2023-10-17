<fieldset>
                    <legend>Informacion General</legend>

                    <label for="titulo">Titulo:</label>
                    <input type="text" name="propiedad[titulo]" id="titulo" placeholder="Titulo de la propiedad" value="<?php echo s($propiedad->titulo); ?>">

                    <label for="Precio">Precio:</label>
                    <input value="<?php echo s($propiedad->precio); ?>" type="number" name="propiedad[precio]" id="Precio" placeholder="Precio de la propiedad">
                    
                    <label for="Imagen">Imagen:</label>
                    <input type="file" id="Imagen" accept="image/jpeg, image/png" name="propiedad[imagen]">

                    <?php if($propiedad->imagen) { ?>
                        
                        <img src="/imagenes/<?php echo $propiedad->imagen ?>" class="imagen-propiedad">

                    <?php } ?>
                    <label for="Descripcion">Descripcion:</label>
                    <textarea id="descripcion" name="propiedad[descripcion]"><?php echo s($propiedad->descripcion); ?></textarea>



                </fieldset>

                <fieldset>
                    <legend>Informacion de la Propiedad</legend>

                    
                    <label for="habitaciones">Habitaciones:</label>
                    <input value="<?php echo s($propiedad->habitaciones); ?>" type="number" name="propiedad[habitaciones]" id="habitaciones" placeholder="Ej:3" min="1" max="9">
                    
                    <label for="wc">Baños:</label>
                    <input value="<?php echo s($propiedad->wc); ?>" type="number" name="propiedad[wc]" id="wc" placeholder="Ej:3" min="1" max="9">

                    <label for="estacionamiento">Estacionamiento:</label>
                    <input value="<?php echo s($propiedad->estacionamiento); ?>" type="number" name="propiedad[estacionamiento]" id="estacionamiento" placeholder="Ej:3" min="1" max="9">

                    
                </fieldset>

                <fieldset>
                    <legend>Vendedor</legend>
                        
                    <select name="propiedad[vendedores_Id]" id="vendedor">
                        <option value="">--Seleccione un Vendedor--</option>
                        

                        <?php foreach ($vendedores as $vendedor) {  ?>

                            <option 
                            <?php echo $propiedad->vendedores_Id === $vendedor->id ? 'selected' : ''; ?>
                            value="<?php echo s($vendedor->id); ?>">
                              <?php echo s($vendedor->nombre) . " " . s($vendedor->apellido); ?></option>

                        <?php } ?>
                        
                    </select>
                </fieldset>

                <?php foreach ($errores as $error): ?>

                    <div class="alerta error">
                    <?php echo $error; ?>
                    </div>

                
                <?php endforeach; ?>
                
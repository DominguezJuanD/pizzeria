

<?php include("Menu2.php"); ?>

  <body>
  <section id="caja" >
    <div class="col-xs-0 col-sm-0 col-md-0 col-lg-0 well" >
        <table style="width:100%" >
          <form id="formulario" align="center">
            <tr>
              <td style="width:50%" valign="top">
                <fieldset align="center">
                  <legend align="center">Ingreso / Egreso</legend>
                  <b> Cantidad $ </b>
                 <input type="number" value=0 id="dinero" name="dinero"/>
                 <b>fecha:</b>
                 <input type="date" name="fecha" placeholder="dd/mm/aaaa" id="fecha" value="<?php echo date("Y-m-d");?>">
                  <br>
                  <br>
                  <legend align="center">Justificacion</legend>
                  <!-- <input type="text" id="observacion" name="observacion" size="50"> -->
                  <textarea name="justificar" id="observacion" rows="4" cols="40"></textarea>
                  <span id="cant">140/140</span>
                  <br>
                  <br>
                  <input type="button" value="Limpiar"  onclick="limpiar();" />
                  <button  onclick="extraer_dinero();" id="extraer"> Extraer dinero <button/>
                  <button  onclick="ingreso_dinero();" id="ingreso"/>Ingresar dinero <button/>
                </fieldset>
              </td>
            </tr>
          </form>
        </table>
      <div class="col-xs-100 col-sm-12 col-md-12 col-lg-100" id="mensaje" align="center"></div>
    </div>
  </section>
  </body>
<script src= "../js/funciones_factura.js"></script>

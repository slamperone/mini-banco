<?php
$this->load->view('top');
#variable con los datos del usuario
#$datosUsuario[];
$this->load->view('sidebar');
?>
<!-- page content -->
<div class="right_col" role="main">

             <div class="">
                 <div class="page-title">
                     <div class="title_left">
                     </div>


                 </div>
                 <div class="clearfix"></div>

                            <div class="row">
                     <div class="col-md-12">
                         <div class="x_panel">
                             <div class="x_content">


                                     <div class="clearfix"></div>

<?php
if ($datos == ""){
 echo '<h1>Aún no hay clientes registrados</h1>';
 exit;
}else{
//print_r($quienes);
//exit;
echo '<div class="row">

                     <div class="col-md-12 col-sm-12 col-xs-12">
                         <div class="x_panel">
                             <div class="x_title">
                                 <h2>Directorio de '.$titulo.'</h2>
                                 <div class="clearfix"></div>
                             </div>
                             <div class="x_content">
                                 <table id="example" class="table table-striped responsive-utilities jambo_table">
                                     <thead>
                                         <tr class="headings">
                                             <th>
                                                 <input type="checkbox" class="tableflat">
                                             </th>
                                             <th>Nombre </th>
                                             <th>Email </th>
                                             <th class=" no-link last"><span class="nobr">Fecha de registro</span>
                                             </th>
                                             <th>Editar</th>

                                         </tr>
                                     </thead>

                                     <tbody>';

                                         foreach ($datos as $quien) {
                                             echo '<tr class="even pointer">
                                             <td class="a-center ">
                                                 <input type="checkbox" class="tableflat">
                                             </td>
                                             <td class=" ">'.$quien->apellidos.' '.$quien->nombres.' </td>
                                             <td class=" ">'.$quien->mail.'</td>
                                             <td class=" last">'.date("d-m-Y",strtotime(substr($quien->registro,0,10))).'</td>
                                             <td class=" "><a href="'.base_url('editar/cliente/'.$quien->idCliente).'">editar</a></td>
                                         </tr>';
                                         }


                                        echo " </div>";

                                         }
?>
                                     </div>
                                 </div>
                                         </tbody>

                                 </table>
                             </div>
                         </div>
                     </div>

                     <br />
                     <br />
                     <br />

<!-- Datatables -->
     <script src="<?php echo base_url('js/datatables/js/jquery.dataTables.js'); ?>"></script>
     <script src="<?php echo base_url('js/datatables/tools/js/dataTables.tableTools.js'); ?>"></script>
     <script>
         $(document).ready(function () {
             $('input.tableflat').iCheck({
                 checkboxClass: 'icheckbox_flat-green',
                 radioClass: 'iradio_flat-green'
             });
         });

         var asInitVals = new Array();
         $(document).ready(function () {
             var oTable = $('#example').dataTable({
                 "oLanguage": {
                     "sSearch": "Buscar:"
                 },
                 "aoColumnDefs": [
                     {
                         'bSortable': false,
                         'aTargets': [0]
                     } //disables sorting for column one
         ],
                 'iDisplayLength': 12,
                 "sPaginationType": "full_numbers",
                 "dom": 'T<"clear">lfrtip',
                 "tableTools": {
                     "sSwfPath": "<?php echo base_url('js/datatables/tools/swf/copy_csv_xls_pdf.swf'); ?>"
                 }
             });
             $("tfoot input").keyup(function () {
                 /* Filter on the column based on the index of this element's parent <th> */
                 oTable.fnFilter(this.value, $("tfoot th").index($(this).parent()));
             });
             $("tfoot input").each(function (i) {
                 asInitVals[i] = this.value;
             });
             $("tfoot input").focus(function () {
                 if (this.className == "search_init") {
                     this.className = "";
                     this.value = "";
                 }
             });
             $("tfoot input").blur(function (i) {
                 if (this.value == "") {
                     this.className = "search_init";
                     this.value = asInitVals[$("tfoot input").index(this)];
                 }
             });
         });
     </script>
 <?php
 $this->load->view('bottom');
 ?>


<!DOCTYPE html>
<html>
<head>


    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
   
    <title>ABC Restaurant</title>

    <title><h1>Muradpur,Chittagong-4000</h1></title>


    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <link href="css/table/demo_page.css" rel="stylesheet" type="text/css" />
    <link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/buttons.dataTables.min.css"/>


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
<link  rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
<link  rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/sl-1.2.4/datatables.min.css"/>

    <!-- BEGIN: load jquery -->
    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
    <script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
     <script src="js/table/dataTables.select.min.js" type="text/javascript"></script>
     <script src="js/table/dataTables.button.min.js" type="text/javascript"></script>
     <script src="js/table/buttons.print.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/table/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

 <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="ttps://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script type="text/javascript" src="jquery.dataTables.js"></script>
<script type="text/javascript" src="sum().js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/sl-1.2.4/datatables.min.js"></script>
<script type="text/javascript">
     $(document).ready(function() {
  $('#example').DataTable( {
       
        

} );
  } );
     </script>
      <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

    <link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
       <script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>
<script type="text/javascript">
$(document).ready(function() {
     table.destroy();
   $('#example').DataTable({
        "processing": true,
        "serverSide": true,
        "columnDefs": [{
            "targets": [4],
            "orderable": false,
            "visible": false
        }],
        "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
        "pagingType": "full_numbers",
        "ajax": {
            "url": "LoadArticulos",
            "type": "POST",
            "datatype": "json",
            "data": {
                CB: $("#txtCBarra").val()
            }
        },
        "columns": [
            { "data": "miColumnToSum", "name": "CodigoDeBarras", "autoWidth": true }
             //etc etc.....
        ],
        "rowCallback": function( row, data, index ) {
           var sum = 0;
           sum += data.miColumnToSum;
           //DO WHAT YOU WANT
        }
    });
    });
</script>

    <!-- END: load jquery -->

    <script src="js/setup.js" type="text/javascript"></script>
	 
</head>
<body>
    
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
                <div class="floatleft logo">
                    <img src="img/livelogo.png" alt="Logo" />
				</div>
				<div class="floatleft middle">
					<h1>Cook Dashbord </h1>
					<p>Food ordering</p>
				</div>
                <div class="floatright">
                    <div class="floatleft">
                        <img src="img/img-profile.jpg" alt="Profile Pic" /></div>

                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li>Hello Cook</li>
                            <li><a href="?action=logout">Logout</a></li>
                        </ul>

                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
        <div class="grid_12">
            <ul class="nav main">
                <li class="ic-dashboard"><a href="../cook/dashbord.php"><span>Dashboard</span></a> </li>
                <li class="ic-form-style"><a href=""><span>User Profile</span></a></li>
				<li class="ic-typography"><a href="changepassword.php"><span>Change Password</span></a></li>
				<li class="ic-grid-tables"><a href="cookinbox.php"><span>Inbox</span></a></li>
                <li class="ic-charts"><a href=""><span>Visit Website</span></a></li>
            </ul>
        </div>
        <div class="clear">
        </div>
    
<!DOCTYPE html>
<html>
<head>
	<title>FARMADIF</title>
	<!-- Bootstrap Core CSS -->
    <link href="/pvendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/pvendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/pvendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="/pvendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="/pvendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Estilos -->
    <link href="/css/estilos.css" rel="stylesheet" type="text/css">

</head>
<body>
	
@yield('contenedor')

<!-- jQuery -->
<script src="/pvendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/pvendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="/pvendor/metisMenu/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="/pvendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="/pvendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="/pvendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="/dist/js/sb-admin-2.js"></script>

 <!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });
});
</script>

</body>
</html>	
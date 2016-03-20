<footer class="container-fluid" style="color:white;background-color:#428BCA;padding:10px;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <p>All Rights Reserved. &copy 2016 Advance Control.</p>
                </div>
            </div>
            </div>
        </footer>

  <script src="assets/js/jquery-1.11.3-jquery.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="assets/js/editor.jqueryui.js"></script>
  <script type="text/javascript" src="assets/js/jquery-ui.js"></script>
  <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="assets/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="assets/js/dataTables.select.min.js"></script>
  <script type="text/javascript" src="assets/js/dataTables.editor.min.js"></script>
<!--
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/dataTables.foundation.min.js"></script>
  <script type="text/javascript" src="assets/js/editor.foundation.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/dataTables.foundation.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.foundation.min.js"></script>
-->

<!--ajax for employees page starts-->
<script type="text/javascript">
    var editor; // use a global for the submit and return data rendering in the examples
 
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        "ajax": "php/updateclient.php",
        "table": "#example",
        "fields": [{
                label:     "Active:",
                name:      "empstatus",
                type:      "checkbox",
                separator: "|",
                options:   [
                    { label: '', value: 1 }
                ]
            }, {
                label: "Employee Name:",
                name:  "empname"
            }, {
                label: "Email:",
                name:  "empemail"
            }, {
                label: "Phone:",
                name:  "empphone"
            }, {
                label: "Company:",
                name:  "empadvcomp"
            }, {
                label: "Username:",
                name:  "empusrname"
            }
        ]
    } );
    
 
    $('#example').DataTable( {
        dom: "Bfrtip",
        ajax: "php/updateclient.php",
        columns: [
            { data: "empname" },
            { data: "empemail" },
            { data: "empphone" },
            { data: "empadvcomp" },
            { data: "empusrname" },
            {
                data:   "empstatus",
                render: function ( data, type, row ) {
                    if ( type === 'display' ) {
                        return '<input type="checkbox" class="editor-active">';
                    }
                    return data;
                },
                className: "dt-body-center"
            }
           
        ],
        select: {
            style: 'os',
            selector: 'td:not(:last-child)' // no row selection on last column
        },
        buttons: [
            { extend: "create", editor: editor },
            { extend: "edit",   editor: editor },
            { extend: "remove", editor: editor }
        ],
        rowCallback: function ( row, data ) {
            // Set the checked state of the checkbox in the table
            $('input.editor-active', row).prop( 'checked', data.empstatus == 1 );
        }
    } );
 
    $('#example').on( 'change', 'input.editor-active', function () {
        editor
            .edit( $(this).closest('tr'), false )
            .set( 'empstatus', $(this).prop( 'checked' ) ? 1 : 0 )
            .submit();
    } );
   
   
    
} );
</script>
<!--ajax for employees page ends-->


<!--ajax for findings page starts-->
<script type="text/javascript">
    var editor; // use a global for the submit and return data rendering in the examples
 
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        "ajax": "php/tablefindings.php",
        "table": "#updatefinding",
        "fields": [{
                label:     "Text:",
                name:      "findtext",
                type:      "textarea"
            }, {
                label: "Description:",
                name:  "finddesc"
            }, {
                label: "Category:",
                name:  "findcat",
                type:"select",
                
                options:[
                    {label:'1',value:1},
                    {label:'2',value:2},
                    {label:'3',value:3},
                    {label:'4',value:4},
                    {label:'5',value:5},
                    {label:'6',value:6},
                    {label:'7',value:7},
                    {label:'8',value:8},
                    {label:'9',value:9},
                    {label:'10',value:10}
                ]
            }
        ]
    } );
    
 
    $('#updatefinding').DataTable( {
        dom: "Bfrtip",
        ajax: "php/tablefindings.php",
        columns: [
            { data: "findtext" },
            { data: "finddesc" },
            { data: "findcat" }
           
        ],
        select: {
            style: 'os',
            selector: 'td:not(:last-child)' // no row selection on last column
        },
        buttons: [
            { extend: "create", editor: editor },
            { extend: "edit",   editor: editor },
            { extend: "remove", editor: editor }
        ]
    } );
 
    
   
   
    
} );
</script>
<!--ajax for findings page ends-->

<!--ajax for manufacturer page starts-->
<script type="text/javascript">
    var editor; // use a global for the submit and return data rendering in the examples
 
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        "ajax": "php/tablemanufact.php",
        "table": "#updatemanufac",
        "fields": [{
                label:     "Is Active:",
                name:      "manufstat",
                type:      "checkbox",
                separator: "|",
                options:   [
                    { label: '', value: 1 }
                ]
            }, {
                label: "Name:",
                name:  "manufname"
            },{
                label: "Description:",
                name:  "manufdesc",
                type:"textarea"
            }
        ]
    } );
    
 
    $('#updatemanufac').DataTable( {
        dom: "Bfrtip",
        ajax: "php/tablemanufact.php",
        columns: [
            { data: "manufname" },
            { data: "manufdesc" },
            
           
            {
                data:   "manufstat",
                render: function ( data, type, row ) {
                    if ( type === 'display' ) {
                        return '<input type="checkbox" class="editor-active">';
                    }
                    return data;
                },
                className: "dt-body-center"
            }
           
        ],
        select: {
            style: 'os',
            selector: 'td:not(:last-child)' // no row selection on last column
        },
        buttons: [
            { extend: "create", editor: editor },
            { extend: "edit",   editor: editor },
            { extend: "remove", editor: editor }
        ],
        rowCallback: function ( row, data ) {
            // Set the checked state of the checkbox in the table
            $('input.editor-active', row).prop( 'checked', data.manufstat == 1 );
        }
    } );
 
    $('#updatemanufac').on( 'change', 'input.editor-active', function () {
        editor
            .edit( $(this).closest('tr'), false )
            .set( 'manufstat', $(this).prop( 'checked' ) ? 1 : 0 )
            .submit();
    } );
   
   
    
} );
</script>
<!--ajax for manufacturer page ends-->

<!--ajax for other-services page starts-->
<script type="text/javascript">
    var editor; // use a global for the submit and return data rendering in the examples
 
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        "ajax": "php/tableservices.php",
        "table": "#updateservice",
        "fields": [{
                label:     "Is Active:",
                name:      "servicesstat",
                type:      "checkbox",
                separator: "|",
                options:   [
                    { label: '', value: 1 }
                ]
            }, {
                label: "Code:",
                name:  "servicescode"
            },{
                label: "Title:",
                name:  "servicetext"
            },{
                label: "Description:",
                name:  "servicesdesc",
                type:"textarea"
            },
                   {
                label: "Description:",
                name:  "servicescat",
                type:"select",
                       options:[
                           {label:'MONTHLY FIRE INSPECTION',value:1},
                           {label:'ANNUAL FIRE INSPECTION',value:2}
                       ]
            }, 
                   {
                label: "Service Quote Description:",
                name:  "servicesqoutdesc",
                type:"textarea"
            }
        ]
    } );
    
 
    $('#updateservice').DataTable( {
        dom: "Bfrtip",
        ajax: "php/tableservices.php",
        columns: [
            { data: "servicescode" },
            { data: "servicetext" },
            { data: "servicesdesc" },
            { data: "servicescat" },
            { data: "servicesqoutdesc" },
           
            
           
            {
                data:   "servicesstat",
                render: function ( data, type, row ) {
                    if ( type === 'display' ) {
                        return '<input type="checkbox" class="editor-active">';
                    }
                    return data;
                },
                className: "dt-body-center"
            }
           
        ],
        select: {
            style: 'os',
            selector: 'td:not(:last-child)' // no row selection on last column
        },
        buttons: [
            { extend: "create", editor: editor },
            { extend: "edit",   editor: editor },
            { extend: "remove", editor: editor }
        ],
        rowCallback: function ( row, data ) {
            // Set the checked state of the checkbox in the table
            $('input.editor-active', row).prop( 'checked', data.servicesstat == 1 );
        }
    } );
 
    $('#updateservice').on( 'change', 'input.editor-active', function () {
        editor
            .edit( $(this).closest('tr'), false )
            .set( 'servicesstat', $(this).prop( 'checked' ) ? 1 : 0 )
            .submit();
    } );
   
   
    
} );
</script>
<!--ajax for other-services page ends-->



<!--ajax for products page starts-->
<script type="text/javascript">
    var editor; // use a global for the submit and return data rendering in the examples
 
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        "ajax": "php/tableprodcut.php",
        "table": "#updateproduct",
        "fields": [{
                label:     "Is Active:",
                name:      "prodstat",
                type:      "checkbox",
                separator: "|",
                options:   [
                    { label: '', value: 1 }
                ]
            }, {
                label: "Code:",
                name:  "prodcode"
            },{
                label: "Category:",
                name:  "prodcat",
                type:"select",
                options:[
                    {label:'[16/32 Channel ] 16/32 Channel',value:1},
                    {label:'[4 Channel] 4 Channel',value:2},
                    {label:'[8 Channel] 8 Channel',value:3},
                    {label:'[Box Cameras with Housing] Box Cameras with Housing',value:4},
                    {label:'[General] General',value:5}
                ]
            },{
                label: "Name:",
                name:  "prodname"
            },{
                label: "Description:",
                name:  "proddesc",
                type:"textarea"
            }
        ]
    } );
    
 
    $('#updateproduct').DataTable( {
        dom: "Bfrtip",
        ajax: "php/tableprodcut.php",
        columns: [
            { data: "prodcode" },
            { data: "prodcat" },
            { data: "prodname" },
            { data: "proddesc" },
           
           
            
           
            {
                data:   "prodstat",
                render: function ( data, type, row ) {
                    if ( type === 'display' ) {
                        return '<input type="checkbox" class="editor-active">';
                    }
                    return data;
                },
                className: "dt-body-center"
            }
           
        ],
        select: {
            style: 'os',
            selector: 'td:not(:last-child)' // no row selection on last column
        },
        buttons: [
            { extend: "create", editor: editor },
            { extend: "edit",   editor: editor },
            { extend: "remove", editor: editor }
        ],
        rowCallback: function ( row, data ) {
            // Set the checked state of the checkbox in the table
            $('input.editor-active', row).prop( 'checked', data.prodstat == 1 );
        }
    } );
 
    $('#updateproduct').on( 'change', 'input.editor-active', function () {
        editor
            .edit( $(this).closest('tr'), false )
            .set( 'prodstat', $(this).prop( 'checked' ) ? 1 : 0 )
            .submit();
    } );
   
   
    
} );
</script>

<!--ajax for forms page starts-->
<script type="text/javascript">
   var editor; // use a global for the submit and return data rendering in the examples
 
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        ajax: "php/tableform.php",
        table: "#updateform",
        fields: [ {
                label: "Form Title",
                name: "formtitle"
            },{
                label: "Upload:",
                name: "image",
                type: "upload",
                display: function ( file_id ) {
                    return '<a src="'+table.file( 'files', file_id ).web_path+'" width="100" height="100"></a>';
                },
                clearText: "Clear",
                noImageText: 'No image'
            }
        ]
    } );
 
    var table = $('#updateform').DataTable( {
        dom: "Bfrtip",
        ajax: "php/tableform.php",
        columns: [
            { data: "formtitle" },
            
            
            {
                data: "image",
                render: function ( file_id ) {
                    return file_id ?
                        '<a href="'+table.file( 'files', file_id ).web_path+'" target="_blank">View File</a>' :
                        null;
                },
                defaultContent: "No image",
                title: "File Link"
            }
        ],
        select: true,
        buttons: [
            { extend: "create", editor: editor },
            { extend: "edit",   editor: editor },
            { extend: "remove", editor: editor }
        ]
    } );
} );
</script>

<!--ajax for promo page starts-->
<script type="text/javascript">
   var editor; // use a global for the submit and return data rendering in the examples
 
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        ajax: "php/tablepromo.php",
        table: "#updatepromo",
        fields: [ {
                label: "Promo Title",
                name: "promotitle"
            },{
                label: "Upload:",
                name: "image",
                type: "upload",
                display: function ( file_id ) {
                    return '<a src="'+table.file( 'files', file_id ).web_path+'" width="100" height="100"></a>';
                },
                clearText: "Clear",
                noImageText: 'No image'
            }
        ]
    } );
 
    var table = $('#updatepromo').DataTable( {
        dom: "Bfrtip",
        ajax: "php/tablepromo.php",
        columns: [
            { data: "promotitle" },
            
            
            {
                data: "image",
                render: function ( file_id ) {
                    return file_id ?
                        '<a href="'+table.file( 'files', file_id ).web_path+'" target="_blank">View File</a>' :
                        null;
                },
                defaultContent: "No image",
                title: "File Link"
            }
        ],
        select: true,
        buttons: [
            { extend: "create", editor: editor },
            { extend: "edit",   editor: editor },
            { extend: "remove", editor: editor }
        ]
    } );
} );
</script>

<!--ajax for clients page starts-->
<script type="text/javascript">
   var editor; // use a global for the submit and return data rendering in the examples
 
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        ajax: "php/tableclients.php",
        table: "#updatclientsdata",
        fields: [ {
                label: "With Advance Control Company:*",
                name: "adc",
				type:"select",
				options:[{label:'AFC',value:'AFC'},{label:'YORK',value:'YORK'},]
            }, {
                label: "Company Name:*",
                name: "cmpnyname"
            }, {
                label: "Email:*:",
                name: "email"
            }, {
                label: "Is Active:",
                name: "isactive",
				type:"checkbox",
				separator: "|",
                options:   [
                    { label: '', value: 1 }
					]
            }, 
			{
                label: "Is Credit:",
                name: "iscredit",
				type:"checkbox",
				separator: "|",
                options:   [
                    { label: '', value: 1 }
					]
            },
			{
                label: "Bulk Discount:*",
                name: "bulkdiscount"
            },{
                label: "Address 1:",
                name: "add1",
				type:"textarea"
            },{
                label: "Address 2:",
                name: "add2",
				type:"textarea"
            },{
                label: "City:",
                name: "city"
            },{
                label: "Province:",
                name: "province"
            },{
                label: "ZipCode:",
                name: "zipcode"
            }, {
                label: "Contact Name:*",
                name: "contactname"
            }, {
                label: "Primary Phone:",
                name: "pphone"
            }, {
                label: "Secondary Phone:",
                name: "sphone"
            },{
                label: "Fax No:",
                name: "faxno"
            },{
                label: "Add Same Address as Location:",
                name: "adrslocstate",
				type:"checkbox",
				separator: "|",
                options:   [
                    { label: '', value: 1 }
					]
            }, {
                label: "If Same Location -> Send Quote / Work Order mail to client:",
                name: "mailstate",
				type:"checkbox",
				separator: "|",
                options:   [
                    { label: '', value: 1 }
					]
            }
        ]
    } );
 
    $('#updatclientsdata').on( 'click', 'tbody td:not(:first-child)', function (e) {
        editor.bubble( this );
    } );
 
    $('#updatclientsdata').DataTable( {
        dom: "Bfrtip",
        ajax: "php/tableclients.php",
        columns: [
            {
                data: null,
                defaultContent: '',
                className: 'select-checkbox',
                orderable: false
            },
			{ data: "adc" },
			{ data: "cmpnyname" },
			{ data: "contactname" },
			{ data: "email" },
			{ data: "pphone" },
			{
                data:   "isactive",
                render: function ( data, type, row ) {
                    if ( type === 'display' ) {
                        return '<input type="checkbox" class="editor-active">';
                    }
                    return data;
                },
                className: "dt-body-center"
            },
			{
                data:   "iscredit",
                render: function ( data, type, row ) {
                    if ( type === 'display' ) {
                        return '<input type="checkbox" class="editor-actives">';
                    }
                    return data;
                },
                className: "dt-body-center"
            },
            {
                data: null,
                render: function ( data, type, row ) {
                    // Combine fields
                    return data.add1;
                },
                editField: ['add1', 'add2','city','province','zipcode','pphone','sphone','faxno']
            }
            
        ],
        order: [ 1, 'asc' ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        buttons: [
            { extend: "create", editor: editor },
            { extend: "edit",   editor: editor },
            { extend: "remove", editor: editor }
        ],
		
		rowCallback: function ( row, data ) {
            // Set the checked state of the checkbox in the table
            $('input.editor-active', row).prop( 'checked', data.isactive == 1 );
        },
		rowCallback: function ( row, data ) {
            // Set the checked state of the checkbox in the table
            $('input.editor-actives', row).prop( 'checked', data.iscredit == 1 );
        }
    } );
	$('#updatclientsdata').on( 'change', 'input.editor-active', function () {
        editor
            .edit( $(this).closest('tr'), false )
            .set( 'isactive', $(this).prop( 'checked' ) ? 1 : 0 )
            .submit();
    } );
	$('#updatclientsdata').on( 'change', 'input.editor-actives', function () {
        editor
            .edit( $(this).closest('tr'), false )
            .set( 'iscredit', $(this).prop( 'checked' ) ? 1 : 0 )
            .submit();
    } );
} );
</script>





  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="assets/js/jquery.validate.min.js"></script>
<!--  <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>-->
</body>
</html>
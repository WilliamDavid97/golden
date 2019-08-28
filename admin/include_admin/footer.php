</div>  <!--/.main-->
 
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>

    <!-- datatable -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>

    <script>
        // $('#calendar').datepicker({
        // });

        !function ($) {
            $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
                $(this).find('em:first').toggleClass("glyphicon-minus");      
            }); 
            $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
        }(window.jQuery);

        $(window).on('resize', function () {
          if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
        })
        $(window).on('resize', function () {
          if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
        })
    </script>   
    <script>
        $(document).ready(function () {
            $('#selectAllBoxes').click(function(){
                if (this.checked) {
                    $('.checkBoxes').each(function(){
                        this.checked = true;
                    })
                }else{
                    $('.checkBoxes').each(function(){
                        this.checked = false;
                    })
                }
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            $('#usetTable').DataTable();
        } );
</script>
</body>

</html>
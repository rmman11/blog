<footer class="page-footer">

      <div class="row">
        <div class="col l6 s12">
          <div class="container">
            <p>Copyright 2019 Your Marius </p>
                 <p> <script src=" {{ asset('/public/js/currentdetails.js') }}"></script></p>
          </div>

        </div>
      </div>

  </footer>


           @stack('js')

           <script>
               $(document).ready(function() {
                   $().ready(function() {
                       $sidebar = $('.sidebar');
                       $navbar = $('.navbar');
                       $main_panel = $('.main-panel');

                       $full_page = $('.full-page');

                       $sidebar_responsive = $('body > .navbar-collapse');
                       sidebar_mini_active = true;
                       white_color = false;

                       window_width = $(window).width();

                       fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

                       $('.fixed-plugin a').click(function(event) {
                           if ($(this).hasClass('switch-trigger')) {
                               if (event.stopPropagation) {
                                   event.stopPropagation();
                               } else if (window.event) {
                                   window.event.cancelBubble = true;
                               }
                           }
                       });

                       $('.fixed-plugin .background-color span').click(function() {
                           $(this).siblings().removeClass('active');
                           $(this).addClass('active');

                           var new_color = $(this).data('color');

                           if ($sidebar.length != 0) {
                               $sidebar.attr('data', new_color);
                           }

                           if ($main_panel.length != 0) {
                               $main_panel.attr('data', new_color);
                           }

                           if ($full_page.length != 0) {
                               $full_page.attr('filter-color', new_color);
                           }

                           if ($sidebar_responsive.length != 0) {
                               $sidebar_responsive.attr('data', new_color);
                           }
                       });

                       $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
                           var $btn = $(this);

                           if (sidebar_mini_active == true) {
                               $('body').removeClass('sidebar-mini');
                               sidebar_mini_active = false;
                               blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
                           } else {
                               $('body').addClass('sidebar-mini');
                               sidebar_mini_active = true;
                               blackDashboard.showSidebarMessage('Sidebar mini activated...');
                           }

                           // we simulate the window Resize so the charts will get updated in realtime.
                           var simulateWindowResize = setInterval(function() {
                               window.dispatchEvent(new Event('resize'));
                           }, 180);

                           // we stop the simulation of Window Resize after the animations are completed
                           setTimeout(function() {
                               clearInterval(simulateWindowResize);
                           }, 1000);
                       });

                       $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
                               var $btn = $(this);

                               if (white_color == true) {
                                   $('body').addClass('change-background');
                                   setTimeout(function() {
                                       $('body').removeClass('change-background');
                                       $('body').removeClass('white-content');
                                   }, 900);
                                   white_color = false;
                               } else {
                                   $('body').addClass('change-background');
                                   setTimeout(function() {
                                       $('body').removeClass('change-background');
                                       $('body').addClass('white-content');
                                   }, 900);

                                   white_color = true;
                               }
                       });
                   });
               });
           </script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
 <script src="https://unpkg.com/@coreui/coreui@2.1.16/dist/js/coreui.min.js"></script>
 <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
 <script src="//cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
 <script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
 <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
 <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
 <script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
 <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
 <script>
  $(function() {
    let copyButtonTrans = '{{ trans('global.datatables.copy') }}'
    let csvButtonTrans = '{{ trans('global.datatables.csv') }}'
    let excelButtonTrans = '{{ trans('global.datatables.excel') }}'
    let pdfButtonTrans = '{{ trans('global.datatables.pdf') }}'
    let printButtonTrans = '{{ trans('global.datatables.print') }}'
    let colvisButtonTrans = '{{ trans('global.datatables.colvis') }}'

    let languages = {
      'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
    };

    $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, { className: 'btn' })
    $.extend(true, $.fn.dataTable.defaults, {
      language: {
        url: languages['{{ app()->getLocale() }}']
      },
      columnDefs: [ 
      {
        orderable: false,
        searchable: false,
        targets: -1
      }],
      select: {
        style:    'multi+shift',
        selector: 'td:first-child'
      },
      order: [],
      scrollX: true,
      pageLength: 100,
      dom: 'lBfrtip<"actions">',
      buttons: [
      {
        extend: 'copy',
        className: 'btn-default',
        text: copyButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'csv',
        className: 'btn-default',
        text: csvButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'excel',
        className: 'btn-default',
        text: excelButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'pdf',
        className: 'btn-default',
        text: pdfButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'print',
        className: 'btn-default',
        text: printButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'colvis',
        className: 'btn-default',
        text: colvisButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      }
      ]
    });

    $.fn.dataTable.ext.classes.sPageButton = '';
  });

</script>
@yield('scripts')
</body>

</html>

      
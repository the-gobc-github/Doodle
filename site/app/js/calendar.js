<script type="text/javascript">

           jQuery(function($){
              $('.month').hide();
              $('.month:first').show();
              // $('.months a:first').addClass('active');
              var current = 1;
              $('.months a').click(function(){
                   var month = $(this).attr('id').replace('linkMonth','');
                   if(month != current){
                     console.log('c' + current);
                     console.log('m' + month);
                       $('#month'+ current).slideUp();
                       $('#month'+ month).slideDown();
                       $('.months a').removeClass('active');
                       $('.months a#linkMonth'+month).addClass('active');
                       current = month;
                   }
                   return false;
              });
           });
  </script>

$(document).ready(function(){
 setUpActionSideBar();
})
function setUpActionSideBar(){
    $('.sidebar-action').on('click', function(){
        if($('#sidebar').hasClass('w-0')){
          $("#sidebar").removeClass('w-0');
          $("#sidebar").addClass('w-full');
        }else{
          $("#sidebar").removeClass('w-full');
          $("#sidebar").addClass('w-0');
        }
      });
}
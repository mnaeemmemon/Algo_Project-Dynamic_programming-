(function($) {

    $(".toggle-password").click(function() {

        $(this).toggleClass("zmdi-eye zmdi-eye-off");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
      });

})(jQuery);


function addarea()
{
  var div1 = document.createElement('div');
  div1.className='col-md-3 col-sm-6 col-xs-12 margin_bottom_30_all';

  var div2 = document.createElement('div');
  div2.className='product_list';

  var div3 = document.createElement('div');
  div3.className='product_img'; 

  var div4 = document.createElement('div');
  div4.className='product_detail_btm';

  var div5 = document.createElement('div');
  div5.className='center';

  var h = document.createElement('h4');
  h.innerText="hi";

  var img = document.createElement('img');
  img.className='img-responsive';
  img.src='images/it_service/3.jpg';


  div5.appendChild(h);
  div4.appendChild(div5);
  div3.appendChild(img);
  div2.appendChild(div3);
  div2.appendChild(div4);
  div1.appendChild(div2);

  document.getElementById('extra_id').appendChild(div1);

  return;
}
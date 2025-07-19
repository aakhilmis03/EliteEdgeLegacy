
$(document).ready(function () {
  "use strict";
  /*======== 13. PROGRESS BAR ========*/
  NProgress.done();
  $('form').parsley();

    var productsTable = $("#productsTable");
    if (productsTable.length != 0) {
      productsTable.DataTable({
        
      });
    }
  
   $(document).on('change','.brand_id',function(){
      var brand_id = $(this).val();
      if(brand_id){
        $.ajax({
          url:'/admin/ajax/get_model_by_brand',
          method:'post',
          data:{_token:$('meta[name="_token"]').attr('content'),  brand_id:brand_id},
          beforeSend:function(){
              $('.model_id').html('<option value="">Loding ...</option>');
          },
          success:function(HTML_OPT){
            $('.model_id').html(HTML_OPT);
          }
        });
      }
   });




  $(document).on('click','.addLocationAdvantageBlock',function(){
    var interiorHtmlBlock = `
      <tr>
        <td><input type="text" class="form-control" placeholder="Enter location advantage desc" name="location_advantage[]" required></td>
        <td class="text-center" style="width:5%"><a href="javascript:void(0);" class="closeInput"><i class="mdi mdi-close text-danger"></i></a></td>
      </tr>
    `;
    $('.locationAdvantageTable tbody').append(interiorHtmlBlock);
  });

  $(document).on('click','.addKeyHighlightsBlock',function(){
    var interiorHtmlBlock = `
      <tr>
        <td><input type="text" class="form-control" placeholder="Enter key highlight desc" name="key_highlights[]" required></td>
        <td class="text-center" style="width:5%"><a href="javascript:void(0);" class="closeInput"><i class="mdi mdi-close text-danger"></i></a></td>
      </tr>
    `;
    $('.KeyHighlightsTable tbody').append(interiorHtmlBlock);
  });

  $(document).on('click','.addQueAnsTable',function(){
    var interiorHtmlBlock = `
      <tr>
        <td><input type="text" name="question[]" class="form-control" autocomplete="off" placeholder="Question" required=""></td>
        <td><textarea class="form-control" name="answer[]" placeholder="answer"></textarea></td>
        <td class="text-center" style="width:5%"><a href="javascript:void(0);" class="closeInput"><i class="mdi mdi-close text-danger"></i></a></td>
      </tr>
    `;
    $('.QueAnsTable tbody').append(interiorHtmlBlock);
  });

  $(document).on('click','.addGalleryImage',function(){
    var interiorHtmlBlock = `
      <tr>
        <td><input type="file" class="form-control" name="gallery[]" required></td>
        <td class="text-center"><a href="javascript:void(0);" class="closeInput"><i class="mdi mdi-close text-danger"></i></a></td>
      </tr>
    `;
    $('.PropertyGalleryTable tbody').append(interiorHtmlBlock);
  });

  $(document).on('click','.addPriceTable',function(){
    var interiorHtmlBlock = `
      <tr>
        <td><input type="text" name="unit_type[]" class="form-control" autocomplete="off" placeholder="Unit Type" required=""></td>
        <td><input type="text" name="unit_area[]" class="form-control" autocomplete="off" placeholder="Area" required=""></td>
        <td><input type="text" name="unit_price[]" class="form-control" autocomplete="off" placeholder="Price*" required=""></td>
        <td class="text-center"><a href="javascript:void(0);" class="closeInput"><i class="mdi mdi-close text-danger"></i></a></td>
      </tr>
    `;
    $('.PriceTable tbody').append(interiorHtmlBlock);
  });

  $(document).on('click','.closeInput',function(){
    $(this).closest('tr').remove();
  });
  

  var select2Multiple = $(".multiple-select");
  if (select2Multiple.length != 0) {
    select2Multiple.select2();
  }
});


function get_location_data(CITY_VAL)
{
            $.ajax({
                type : 'POST',
                url : "/admin/ajax/get_location_data",
                data : {_token:$('meta[name="_token"]').attr('content'),'city_id':CITY_VAL},
                beforeSend:function(){
                  $('#locationSelect').html('<option value="">Loding ...</option>');
                },
                success : function(HTML_OPT){
                   $("#locationSelect").html(HTML_OPT);
                }
            });
}
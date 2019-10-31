
 $(document).ready(function(){
 	$("a#delete_image").on("click",function(){
 		var url =  base_url+"/admin/product/delimg/";				
 		var _token = $("form[name='from-editproduct']").find("input[name='_token']").val();
 		var idHinh = $(this).parent().find("img").attr("data-id");
 		var img = $(this).parent().find("img").attr("src");
 		var rid = $(this).parent().find("img").attr("id");
 		$.ajax({
 			url: url + idHinh,
 			type: 'GET',
 			cacha: false,
 			data:{"_token":_token,"idHinh":idHinh,"urlHinh":img},
 			success: function(data){
 				if(data == "Oke"){
 					$("#"+rid).remove();
 				}else{
 					alert("Error! Vui lòng kiểm tra lại")
 				}
 			}
 		});
 	});
 	$(".alert").delay(3000).slideUp();
 	$(".hide_listcthd").hide();
 	$(".list_show").click(function(){
 		var id = $(this).attr('data-id');
 		$(".show_listcthd_"+id).toggle("fast");
 	});
 });
$(document).ready(function(){if($(document).on("click","#paging-more",function(t){var a=$(this).attr("data-keywords"),o=$(this).attr("data-location"),e=$(this).attr("data-type"),r=$(this).attr("data-page");$(".paging-more-btn").hide(),$(".paging-more-loader").show(),$.post("//localhost:8888/operatorlibrary/index.php/ajax/pageMedia",{t:e,l:o,k:a,p:r},function(t){var a=$.parseJSON(t);$("#media-list").append(a.imageData),$("#paging-ajax").html(a.pagingData),$(".paging-more-btn").show(),$(".paging-more-loader").hide()})}),$(document).on("click","#paging-more-creative",function(t){var a=$(this).attr("data-name"),o=$(this).attr("data-page");$(".paging-more-btn").hide(),$(".paging-more-loader").show(),$.post("//localhost:8888/operatorlibrary/index.php/ajax/pageMediaCreative",{c:a,p:o},function(t){var a=$.parseJSON(t);$("#media-list").append(a.imageData),$("#paging-ajax").html(a.pagingData),$(".paging-more-btn").show(),$(".paging-more-loader").hide()})}),$(document).on("click","#add-basket",function(t){var a=$(this).attr("data-id"),o=$(this).attr("data-type");$("#add-basket i").css({color:"#f27374"}),$.post("//localhost:8888/operatorlibrary/index.php/cart/add",{t:o,i:a},function(t){"success"!==t&&alert(t)})}),$(document).on("click","#remove-basket",function(t){var a=$(this).attr("data-id"),o=$(this).attr("data-type");$("#remove-basket i").css("color",""),$.post("//localhost:8888/operatorlibrary/index.php/cart/remove",{t:o,i:a},function(t){"success"!==t&&alert(t)})}),$("#basket-button").length>0){var t=$("#basket-button").attr("data-id"),a=$("#basket-button").attr("data-type");$.post("//localhost:8888/operatorlibrary/index.php/cart/button",{t:a,i:t},function(t){"success"!==t&&$("#basket-button").html(t)})}if($("#favorite-button").length>0){var t=$("#favorite-button").attr("data-id"),a=$("#favorite-button").attr("data-type");$.post("//localhost:8888/operatorlibrary/index.php/fav/button",{t:a,i:t},function(t){"success"!==t&&$("#favorite-button").html(t)})}$("#media-error").length>0&&$("#media-error").delay(7e3).fadeOut(),$(document).on("click","#add-favorite",function(t){var a=$(this).attr("data-id"),o=$(this).attr("data-type");$("#add-favorite i").css({color:"#f27374"}),$.post("//localhost:8888/operatorlibrary/index.php/fav/add",{t:o,i:a},function(t){"success"!==t&&alert(t)})}),$(document).on("click","#remove-favorite",function(t){var a=$(this).attr("data-id"),o=$(this).attr("data-type");$("#remove-favorite i").css("color","#818a91"),$.post("//localhost:8888/operatorlibrary/index.php/fav/remove",{t:o,i:a},function(t){"success"!==t&&alert(t)})})});

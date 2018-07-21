$(function() {
						var catid = $("#filter_catid").val();
						var orderby = $("#filter_order").val();

						var url;
						$(".search-option").bind("click", function(e) {
							e.preventDefault();
							$(this).parents(".search-filter").find(".search-option").removeClass("active");
							$(this).addClass("active");
							var v = $(this).attr("v");
							var obj = $(this).parents(".search-filter").attr("o");
							eval(obj + "='" + v + "'");
							url = "/index.php?m=article&a=list&catid=" + catid + "&orderby=" + orderby + "#select_box";
							window.location.href = url;
						});

					})


<div class="header-section">
						<!--menu-right-->
						<div class="top_menu">
						<img src="../logo.png" height="100" width="150" style="margin-left:20px"></img>
						      <font size="7" style="margin-left:30px;margin-top:10px;"color="#FF6347" > CityHub</font>
							<!--/profile_details-->
								<div class="profile_details_left">
																				
																			<span>
																			<a href="adminadd.php"><button  type="button" style="margin-top:20px;" class="btn btn-default" aria-label="Left Align"><font size="4" >Add new Admin</font></button></a>
																			
																			<a href="addadvertisement.php"><button  type="button"  style="margin-top:20px;" class="btn btn-default" aria-label="Left Align"><font size="4" >Add Advertisement</font></button></a>
																			
																			<a href="logout.php"><button  type="button"  style="margin-top:20px;" class="btn btn-default" aria-label="Left Align"><font size="4" >Logout</font></button></a>		
																			
																			</span>
																			
																			
																			

														
																<script type="text/javascript">
			
																	function DropDown(el) {
																		this.dd = el;
																		this.placeholder = this.dd.children('span');
																		this.opts = this.dd.find('ul.dropdown > li');
																		this.val = '';
																		this.index = -1;
																		this.initEvents();
																	}
																	DropDown.prototype = {
																		initEvents : function() {
																			var obj = this;

																			obj.dd.on('click', function(event){
																				$(this).toggleClass('active');
																				return false;
																			});

																			obj.opts.on('click',function(){
																				var opt = $(this);
																				obj.val = opt.text();
																				obj.index = opt.index();
																				obj.placeholder.text(obj.val);
																			});
																		},
																		getValue : function() {
																			return this.val;
																		},
																		getIndex : function() {
																			return this.index;
																		}
																	}

																	$(function() {

																		var dd = new DropDown( $('#dd') );

																		$(document).click(function() {
																			// all dropdowns
																			$('.wrapper-dropdown-3').removeClass('active');
																		});

																	});

																</script>
										   
									     
								   							   		
							
							</div>
							<div class="clearfix"></div>	
							<!--//profile_details-->
						</div>
						<!--//menu-right-->
					<div class="clearfix"></div>
				</div>
					<!-- //header-ends -->

<script type="text/javascript">
    var centreGot = false;
</script>
<?php echo $map[ 'js']; ?>
<section>
    <?php $this->load->helper('url'); if ($this->session->userdata('is_logged_in')) { ?>
   		 <br><br><br><br>
    <? }else{ ?>
   		 <br><br><br><br><br>
    <? }; ?>
<!--     <button id='hideoverlay'>hideoverlay</button> -->
    <section class="searchView hide" id="searchViewdisplay">
        <section class="findLocation alert alert-info">
            	<h3 class="h3-findlocationtitle">Find Location</h3>

            <section class="findLocation-Close">
                <button class="gydus-findL-btn btn  btn-danger pull-right clearfix" id="findLbtnX" type="button">X</button>
            </section>
            <!-- end of findLocation Close-->
        </section>
        <!-- end of findlocation-->
        <section class="searchkeyword">
        
            <form action="<?php echo base_url();?>index.php/mapController/search" method='get' class="form-search">
                <section class="gydus-kw-append input-append">
                    <input type="text" class="gydus-kw-search" name='searchLocation' placeholder="Search keyword or room">
                </section>
                <!-- end of input-append-->
                	<h3 class="searchOR">or</h3>

        </section>
        <!-- end of searchkeyword-->
        <section class="dropdownBuildings">
            <select name="buildingSelection" class="buildingSelect">
                <option>SELECT BUILDING</option>
                <option value="FS3B">FS3B</option>
				<option value="FS3C">FS3C</option>
				<option value="FS3D">FS3D</option>
				<option value="FS3E">FS3E</option>
				<option value="FS3F">FS3F</option>
				<option value="FS4A">FS4A</option>
				<option value="FS4B">FS4B</option>
				<option value="FS4C">FS4C</option>
				<option value="FS4E">FS4E</option>
				<option value="FS4F">FS4F</option>
				<option value="FS4G">FS4G</option>
            </select>
        </section>
        <!-- end fo dropdownBuildings-->
        <section class="poiTitleSection alert alert-info">
            	<h4 class="poiHeader ">Select Points of Interest</h4>

        </section>
        <section class="pointsofinterest">
            <section class="pointsofinterest1">
                <section name="poiSelection1" class="poiSelection btn-group">
                	<section class="patioPoisection pull-left">
                		<label class="pull-left">
	                		<input name="points[]" value="Patio" type="checkbox"/><span>Patio</span>
                		</label>
                	</section><!-- end of patio poi section-->
                	
                	<section class="foodPoisection pull-left">
                		<label class="pull-left">
	                		<input name="points[]" value="Food/Beverage" type="checkbox"/><span>Food/Beverage</span>
                		</label>
                	</section><!-- end of food poi section-->
                	
                	<section class="restroomPoisection pull-left">
                		<label class="pull-left">
	                		<input name="points[]" value="Restroom" type="checkbox"/><span>Restroom</span>
                		</label>
                	</section><!-- end of food poi section-->
                	
                	<section class="bookstorePoisection pull-left">
                		<label class="pull-left">
                    	 	<input  name="points[]" value="Book Store" type="checkbox" /><span>Distribution Center</span>
                    	</label>
                	</section><!-- end of bookstore poi section-->
                	
                	<section class="libraryPoisection pull-left">
                		<label class="pull-left">
                  		  <input name="points[]" value="Library" type="checkbox" /><span>Library</span>
                		</label>
                	</section><!-- end of library poi section-->
                	
                	<section class="receptionistPoisection pull-left">
                		<label class="pull-left">
                    	  <input  name="points[]" value="Receptionist" type="checkbox"/><span>Receptionist</span>
                		</label>
                	</section><!-- end of receptionisht poi section-->
                </section>
            </section>
            <!-- end of points of interst 1-->
          
        </section>
        <!-- end of points of interest-->
        <section class="findlocationBtns">
            <section class="suggestSpotbtn">
                <?php $this->load->helper('url'); if ($this->session->userdata('is_logged_in')){ ?>
                <a href="<?php echo base_url();?>index.php/mapController/suggestaspotView" class="btn btn-large btn-success btn-block">Suggest a Spot</a>
                <?php }else{ ?>
                <a class="btn btn-large btn-success btn-block disabled">Suggest a Spot</a>
                <?php }; ?>
            </section>
            <!-- end of suggest spot btn-->
            <br>
            <section class="viewLocationbtn">
                <button class="btn btn-large btn-block btn-primary" type="submit">View Location</button>
            </section>
            <!-- end of view location btn-->
        </section>
        <!-- end of find location btns-->
        </form>
    </section>
    <!-- end of searchView-->
    <section class="findlocationButtonTop">
        	<h4 class="map-view-fL btn btn-large btn-block" id="map-viewFLbtn">Find Location  <i class="icon-chevron-down"></i></h4>

    </section>
    <!-- end of findlocatoinButtonTop-->
    
    <section class="navigationforms alert alert-info hide">
        <button type="button" id="closenav" class="close">&times;</button>
        	<h3 class="navTitle">Get Directions</h3>
        <form action="<?php echo base_url();?>index.php/mapController/navigateViaForm" method='get' >	
	        <label>From Point A</label>
	
	        
	         <section class="dropdownBuildingsA">
	            <select name="buildingSelectionA" class="buildingSelect">
	                <option>SELECT BUILDING</option>
	                <option value="FS3B">FS3B</option>
	                <option value="FS3C">FS3C</option>
	                <option value="FS3D">FS3D</option>
	                <option value="FS3E">FS3E</option>
	                <option value="FS3F">FS3F</option>
	                <option value="FS4A">FS4A</option>
	                <option value="FS4B">FS4B</option>
	                <option value="FS4C">FS4C</option>
	                <option value="FS4E">FS4E</option>
	                <option value="FS4F">FS4F</option>
	                <option value="FS4G">FS4G</option>
	
	            </select>
	        </section>
	        
	        <input type="text" name="pointA" placeholder="Point A" id="pointa">
	
	        <br>
	        
	         <label>To Point B</label> 
	         <section class="dropdownBuildingsB">
	            <select name="buildingSelectionB" class="buildingSelect">
	                <option>SELECT BUILDING</option>
	                <option value="FS3B">FS3B</option>
	                <option value="FS3C">FS3C</option>
	                <option value="FS3D">FS3D</option>
	                <option value="FS3E">FS3E</option>
	                <option value="FS3F">FS3F</option>
	                <option value="FS4A">FS4A</option>
	                <option value="FS4B">FS4B</option>
	                <option value="FS4C">FS4C</option>
	                <option value="FS4E">FS4E</option>
	                <option value="FS4F">FS4F</option>
	                <option value="FS4G">FS4G</option>
	
	            </select>
	        </section>
	
	        <input type="text" name="pointB" placeholder="Point B" id="pointb">
	        <br>
	        <button class="getdirections btn btn-success btn-large btn-block" type="submit">Get Directions</button>
	    </section>
	  </form> <!-- END OF NAV FORM -->
	  </section>	<span><?php if($this->session->flashdata('message')) {
						echo '<section id="sasPromptsuccess" class=" message alert alert-block alert-success">
';
						echo ''.$this->session->flashdata('message').'';


						echo'</section>';
						}?></span>

<section id="mapSpot" class="map-spot">
    <section id="map_canvas" class="mapCanvas pull-left" style="width:100%; height:100%">
        <?php echo $map[ 'html']; ?>
    </section>
</section>
<?php $this->load->view('templates/footer'); ?>
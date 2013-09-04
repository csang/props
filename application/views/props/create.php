       <div id="mainTwo">
       <h1>PROPS Submission Form</h1>
       <section id="formpara">
            <p>Help celebrate the Full Sail culture of leadership, innovation, stewardship, artistic contribution, and community involvement to continuously improve 				the environment for our learning community. Every day, across campus great things are happening. Giving PROPS is a great way to let your colleagues 				                know that they are doing great work. Getting PROPS is pretty cool too.
            </p><br />
    
            <p>It's easy to give PROPS, simply provide the name of the faculty member, choose the category of PROPS you are awarding, and enter a number from 1-10              (1 is lowest, 10 is highest). There are four possible categories of PROPS: LEADERSHIP, EDUCATIONAL INNOVATION, CREATIVE CONTRIBUTION, and COMMUNITY              INVOLVEMENT. Please see the Full Sail Wiki for a full explanation of each.
            </p>
       </section>
       <h1 id="thankYou">Thanks for taking a minute to celebrate the awesome contributions happening every day here at Full Sail!</h1>
 		<!--<form id='propForm'name="propform" action="" method="post" enctype="mulitipart/form-data">-->
		<?php echo validation_errors(); ?>
		
		<?php echo form_open('props/create') ?>
        <div id='propForm'>
   	   		<fieldset>
                <label for="to">Who are you giving PROPS to?</label>
                   <input list="staff" name="to" type="text" id="staffName">
                   <datalist id="staff">
                   <? foreach($staff->ar_no_escape[0]->name as $d){ ?>
                   <option value="<? echo($d); ?>"/>
                   <? }?>
                   </datalist>
               <label for="anonymous">Remain Anonymous?</label>
                <div id="radio">
                   <input type="radio"name="anonymous" id="anonymous" value="1"/><h1 id="yes">Yes</h1>
                   <input type="radio" name="anonymous" id="anonymousTwo" value="0"/><h1 id="no">No</h1>
                </div>
                <label for="amount">How many PROPS do you want to give?</label>
                <div id="radioTwo">
                    <label for="r">1</label>
                   		<input type="radio"name="amount" value="1"/>
                  	<label for="r">2</label>
                    	<input type="radio" name="amount" value="2"/>
                  	<label for="r">3</label>
                    	<input type="radio"name="amount" value="3"/>
                   	<label for="r">4</label>
                    	<input type="radio" name="amount" value="4"/>
                    <label for="r">5</label>
                    	<input type="radio"name="amount" value="5"/>
                    <label for="r">6</label>
                   		<input type="radio" name="amount" value="6"/>
              		<label for="r">7</label>
                    	<input type="radio"name="amount" value="7"/>
               		<label for="r">8</label>     
                    	<input type="radio" name="amount" value="8"/>
                	<label for="r">9</label>
                   		<input type="radio"name="amount" value="9"/>
                   	<label for="r">10</label>
                    	<input type="radio" name="amount" value="10"/>
               </div>
               <label for="category">What are you giving PROPS for?</label>
               
               <div class="styled-select">
               <select name="category">
                  <option value="1">Academic Innovation: Contribution to educational innovation!</option>
                  <option value="2">Leadership: Possessing the heart of a leader!</option>
                  <option value="3">Community: Making an outstanding contribution within the Full Sail community.</option>
                  <option value="4">Creative Contribution: Making an outstanding contribution to the field of art!</option>
              </select>
              </div>
                
                
            <label for="why">Now, tell us about why you are giving them PROPS.</label>
            <textarea name="why"></textarea>
            <input type="submit" value="Submit" id="submitTwo"/>
        </fieldset>
       </div>
    </form>
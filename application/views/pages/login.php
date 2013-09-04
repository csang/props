    <?php echo validation_errors(); ?>
    <div id="mainThree">
        <h2>Sign In</h2>
		<?php echo form_open('pages/login') ?>
        <!--<form id='studentLogin'name="login" action="" method="post" enctype="mulitipart/form-data">-->
            <div id="studentLogin">
            <fieldset>
                <div id="signup">
                <!--<label for="email">email</label>-->
                   <input type="text"name="email" id="email" placeholder="Email"/>
               <!--<label for="password">password</label>-->
                   <input type="password"name="password" id="password" placeholder="Password"/>
                   <input type="submit" value="Submit" id="loginSubmit"/>
                </div>      
            </fieldset>
        	</div>
        </form>
        <section>
            <h1>PROPS Mission</h1>
            <p>To celebrate the Full Sail culture of leadership, innovation, stewardship, creative contribution, and community involvement to 			           continuously improve the environment for our learning community.
            </p>
        </section>
    </div>

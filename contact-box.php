
<a name="contact"></a><div class="content_row6 <?php if ($page_id !== '1') { ?>grey<?php } ?>">
     <div class="wrapper">
        <div class="contact_div">
            <?=$message;?>
            <form action="" method="post">
                <h3>Get a Free Quote<br />or Schedule an Apointment:</h3>
                <div class="form_div">
                    <input type="text" name="name" <?php echo(!empty($_POST['name']))? ' value="' . $_POST['name'] . '"' : ' placeholder="Name" ' ; ?>/>
                </div>
                <div class="form_div">
                    <input type="email" name="email" placeholder="Email" <?php echo (!empty($_POST['email']))? ' value="' . $_POST['email'] . '"' :  ' placeholder="email" '  ; ?>/>
                </div>
                <div class="form_div">
                    <input type="tel" name="phone" placeholder="Phone" <?php echo (!empty($_POST['phone']))? ' value="' . $_POST['phone']  . '"':  ' placeholder="phone" '  ; ?>/>
                </div>
                <div class="form_div">
                    <textarea name="message" <?php echo (empty($_POST['message']))? 'placeholder="Message"' : '' ; ?>><?php echo (!empty($_POST['message']))? $_POST['message'] : '' ; ?></textarea>
                </div>
                <div class="form_div">
                    <input type="submit" name = "submit" value="Submit"/>
                </div>
            </form>
        </div>
    </div>
</div>
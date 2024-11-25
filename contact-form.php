
<div class="form-container">
     <form class="form" action="../sendmail.php" method="post">
        <div class="row">
            <div class="col-sm-12">
                <input type="hidden" value="<?php echo $_SERVER['REQUEST_URI']; ?>" name="page_url">
                <input type="text" name="Name" placeholder="First Name" required />
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <input name="Number" rangelength="[7,12]" type="number" placeholder="Phone Number" id="phone-number" required="" class="cta-phone" autocomplete="off">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <input type="email" name="Email" placeholder="Email " required />
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <textarea placeholder="About Your Project" name="Message" required=""></textarea>
                    <!-- <label for="">Message</label>
                    <span>Message</span> -->
                    <input type="text" style="display: none;" name="hunnypot">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <input type="submit" value="Submit" class="reset-button formBtn">
            </div>
        </div>
    </form>
</div>
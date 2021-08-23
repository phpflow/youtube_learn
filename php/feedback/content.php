<div class="card o-hidden border-0 shadow-lg">
    <div class="card-body p-0">
        <div class="col-lg-7">
            <div class="p-5">
                <form class="user" method="POST" action="<?=$_SERVER['PHP_SELF']?>">
                   <div class="form-group row mb-3">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name"
                                required>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name"
                                required>
                        </div>
                 </div>
            <div class="form-group mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email Address"
                    required>
            </div>
            <div class="form-group mb-3">
                <input type="tel" class="form-control form-control-user" id="mobile" name="mobile"
                    pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" placeholder="Mobile Number (123-23-324)">
            </div>
            <div class="form-group mb-3">
                <textArea type="message" class="form-control form-control-user" id="message" name="message"
                    placeholder="Enter Feedbcak Message" required></textArea>
            </div>
            <button type="submit" id="SubmitButton" name ="SubmitButton" class="btn btn-primary btn-user btn-block">
                Submit Feedback
            </button>
            </form>
        </div>
    </div>
</div>
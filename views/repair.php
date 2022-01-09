<?php
    include('header.php');
    include('navbar.php');
?>

<section class="repair-holder mx-auto">
    <h1>Ask for Assistance</h1>
    <form action="request.php" method="post">
        <div class="row repair-form">
            <div class="col-md-12">
                <h4>Client Name</h4>
                <div class="form-group pb-4">
                    <input id="repair-firstname" name="client_name" type="text" placeholder="Client Name" required/>
                </div>

                <h4>Email</h4>
                <div class="form-group pb-4">
                    <input id="repair-email" name="email" type="email" placeholder="Contact Email" required/>
                </div>
                
                <hr class="short-line"/>
                
                <h5>Issue</h5>

                <h4>Subject</h4>
                <div class="form-group pb-4">
                    <input id="issue-subject" name="issueSubject" type="text" required/>
                </div>

                <h4>Description</h4>
                <div class="form-group pb-4">
                    <textarea id="issue-description" name="desc" type="text" rows="8" required></textarea>
                </div>
            </div>
        </div>

        <div class="row repair-form d-flex justify-content-end px-4">
            <a href="home.php" class="btn btn-lg custom-cancel mx-4">Cancel</a>
            <input name="submit_button" type="submit" value="Submit" class="btn btn-lg custom-submit">
        </div>

        <hr/>
    </form>
</section>

<script>
    document.getElementById("repair").style.fontWeight = "bold";
    document.getElementById("navbar").style.padding = "0px 30px";
    document.getElementById("navbar").style.height = "auto";
    document.getElementById("navbar").style.background = "#F7F8F3";
    document.getElementById("navbar").style.transition = "0s";
    document.getElementById("nav-logo").style.display = "block";
                
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("navbar").style.padding = "0px 30px";
            document.getElementById("navbar").style.height = "auto";
            document.getElementById("navbar").style.background = "#F7F8F3";
            document.getElementById("nav-logo").style.display = "block";
        } else {
            document.getElementById("navbar").style.padding = "0px 30px";
            document.getElementById("navbar").style.height = "auto";
            document.getElementById("navbar").style.background = "#F7F8F3";
            document.getElementById("nav-logo").style.display = "block";
        }
    }

    function changeHeight(){
        var x = document.getElementById("navbar");
        if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
            if (x.style.height === "90px") {
                x.style.height = "375px";
            } else {
                x.style.height = "90px";
            }
        // } else if (x.style.height === "100vh" && (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50)) {
        //     if (x.style.height === "100vh") {
        //         x.style.height = "100vh";
        //     } else if (x.style.height === "100vh" && (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50)) {
        //         x.style.height = "375px";
        //     } else {
        //         // x.style.height = "90px";
        //         x.style.height = "375px";
        //     }
        }
    }
</script>

<?php include('footer.php'); ?>
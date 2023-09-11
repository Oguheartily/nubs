<?php
include("functions/userfunctions.php");
include('includes/header.php');
?>
<div class="container">
    <div class="row mt-2">
        <div class="col-12">
            <div class="card mb-3">
                <div class="card-header bg-white text-info text-center">
                    <h4>Cookies Policy</h4>
                </div>
                <div class="card-body">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#cookieconsent2">
                        Launch cookie consent
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="cookieconsent2" tabindex="-1" aria-labelledby="cookieconsentLabel2" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title" id="cookieconsentLabel2">Cookies & Privacy</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-3 d-flex align-items-center justify-content-center">
                                            <i class="fas fa-cookie-bite fa-4x text-primary"></i>
                                        </div>

                                        <div class="col-9">
                                            <p>This website uses cookies to ensure you get the best experience on our website.<a class="d-block" href="cookies-policy.php">Read more about cookies</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Reject</button>
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                                        Accept
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->

                    <p>
                        General information on Cookies and how Nubs-Bille uses cookies when you visit our website.
                    </p>
                    <b>What are cookies?</b>
                    <div>
                        A cookie is a small file of letters and numbers that websites send to the browser which are stored in the User terminal,
                        which might be your personal computer, a mobile phone, a tablet, or any other device.
                    </div>
                    <p>
                    <div><b>Why we need Cookies</b></div>
                    <div>We use Cookies to distinguish you from other users of our website.</div>
                    </p>
                    <p>
                    <div><b>Third Party Cookies</b></div>
                    <div>Third party Cookies are placed by third parties that provide services to Us and/or to you.</div>
                    <div>Third party Cookies could be used by advertising services to serve up tailored advertising to you on Our Site,
                        or by third parties providing analytics services to Us.</div>
                    </p>
                    <p>
                    <div><b>Persistent Cookies</b></div>
                    <div>
                        Any of the above types of Cookie may be a persistent Cookie. Persistent Cookies are those which remain on your computer
                        or device for a predetermined period and are activated each time you visit Our Site.
                    </div>


                    <div><b>Session Cookies</b></div>
                    <div>
                        Most of the cookies used by Nubs-Bille are Session Cookies. Session Cookies are temporary and only remain on your
                        computer or device from the point at which you visit Our Site until you close your browser. Session Cookies are deleted
                        when you close your browser.
                    </div>
                    </p>
                    <p>
                    <div><b>Consent</b></div>
                    <div>
                        Before Cookies are placed on your computer or device, you will be shown a prompt requesting your consent to set those Cookies.
                        By giving your consent to the placing of Cookies you are enabling Us to provide the best possible experience and service to you.
                    </div>
                    </p>
                    <p>
                        <em>In addition to the controls that We provide, you can choose to enable or disable Cookies in your internet browser.</em>
                    </p>
                    <p>
                    <div><b>Changes to this Cookie Policy</b></div>
                    <div>
                        Changes and Alterations to this Cookie Policy may take place at any time. If We do so, details of the changes will be highlighted at the top of this page.
                        Any such changes will become effective on your first use of Our Site after the changes have been made.
                    </div>
                    </p>
                    <h5>Links to Other Related Information</h5>
                    <ul>
                        <li><a href="privacy-policy.php">Privacy Policy</a></li>
                        <li><a href="terms-of-service.php">Terms of Service</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>